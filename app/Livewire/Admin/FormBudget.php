<?php

namespace App\Livewire\Admin;

use App\Models\budgetmaster; // Pastikan ini huruf besar
use App\Models\budgets; // Asumsi nama model adalah Budget.php
use App\Models\BudgetUser;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormBudget extends Component
{
    // ... properti ...
    public $users;
    public $total_amount;
    public $name;
    public $start_date;
    public $end_date;
    public $pilihan_users = [];
    public $detail;
    // ...

    public function mount()
    {
        $this->users = User::where('role', 'karyawan')->get();
    }
    
    public function store()
    {
        // dd($this->all());
        
        // 1. VALIDASI
        $this->validate([
            'name' => 'required|string',
            'total_amount' => 'required|numeric|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'pilihan_users' => 'required|array|min:1',
            'detail' => 'required|string'
        ],[
            'name.required' => 'nama harus di isi!',
            'name.string' => 'nama harus berupa huruf!',
            'total_amount.required' => 'nominal harus di isi!',
            'total_amount.numeric' => 'nominal harus angka!',
            'pilihan_users' => 'pilih karyawan!',
            'text.required' => 'Harap di isi!'
        ]);
        
        $tahunbudget = Carbon::parse($this->start_date)->year;
        // dd($tahunbudget);

        // 2. MULAI TRANSAKSI
        DB::beginTransaction(); 
        
        try {
             // 3. CARI & KUNCI MASTER BUDGET DI DALAM TRY
            $masterBudget = budgetmaster::where('tahun_anggaran', $tahunbudget)
                                        ->lockForUpdate() // Mencegah Double Spending
                                        ->first(); 

        //     // 4. GUARD CLAUSE 1: PASTIKAN MASTER BUDGET DITEMUKAN (Mencegah error NULL)
            if (!$masterBudget) {
                DB::rollBack();
                session()->flash('error', 'Master Budget untuk tahun ' . $tahunbudget . ' tidak ditemukan!');
                return;
            }

        //     // 5. GUARD CLAUSE 2: CEK SALDO (Logika Saldo yang Benar)
            if ($masterBudget->budget < $this->total_amount) {
                DB::rollBack();
                session()->flash('error', 'Maaf, saldo Master Budget tidak cukup.');
                return;
            }
            
        //     // 6. OPERASI 1: PENGURANGAN DAN SIMPAN MASTER BUDGET
            $masterBudget->budget -= $this->total_amount;
            $masterBudget->save();
            // dd($masterBudget);

            // dd($tahunbudget, $masterBudget);
            // 7. OPERASI 2: BUAT SUB-BUDGET (Gunakan Model 'Budget', bukan 'budgets')
            $subbudget = budgets::create([ 
                'user_id' => Auth::id(),
                'budgetmaster_id' => $masterBudget->id, 
                'name' => $this->name,
                'total_amount' => $this->total_amount,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'detail' => $this->detail
            ]);
            // 8. OPERASI 3: RELASI BUDGET USER
            foreach ($this->pilihan_users as $user_id) {
                BudgetUser::create([
                    'budget_id' => $subbudget->id, 
                    'user_id' => $user_id,
                ]);
            }

            // 9. COMMIT
            DB::commit();
            
            session()->flash('message', 'Budget berhasil dialokasikan dan Master Budget dikurangi.');
            return redirect()->route('admin.budget');
            
        } catch (\Exception $e) {
            // 10. ROLLBACK TEKNIS
            DB::rollBack();
            // dd($e); // Untuk debugging
            session()->flash('error', 'Terjadi kesalahan sistem yang tidak terduga. Transaksi dibatalkan.');
            return; 
        }
    }

    public function render()
    {
        return view('livewire.admin.form-budget')->extends('layouts.admin');
    }
}