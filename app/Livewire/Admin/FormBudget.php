<?php

namespace App\Livewire\Admin;

use App\Models\budgets;
use App\Models\BudgetUser;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FormBudget extends Component
{
    // public $name;
    public $users;
    public $total_amount;
    public $start_date;
    public $end_date;
    public $pilihan_users = [];
    // public $user_id;

    public function mount()
    {
        $this->users = User::where('role', 'karyawan')->get();
    }
    
    
    
    public function store()
    {
        dd($this->all());
        $this->validate([
            // 'name' => 'required|string|max:255',
            'total_amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'pilihan_users' => 'required|array|min:1',
        ],[
            'name.required' => 'Nama budget wajib diisi.',
            'name.string' => 'Nama budget harus berupa teks.',
            'name.max' => 'Nama budget maksimal 255 karakter.',
            'total_amount.required' => 'Total anggaran wajib diisi.',
            'total_amount.numeric' => 'Total anggaran harus berupa angka.',
            'start_date.required' => 'Tanggal mulai wajib diisi.',
            'start_date.date' => 'Tanggal mulai tidak valid.',
            'end_date.required' => 'Tanggal selesai wajib diisi.',
            'end_date.date' => 'Tanggal selesai tidak valid.',
            'end_date.after_or_equal' => 'Tanggal selesai harus sama dengan atau setelah tanggal mulai.',
        ]);

        // Simpan logika penyimpanan data budget di sini
        budgets::create([
            'user_id' => Auth::id(),
            'total_amount' => $this->total_amount,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        foreach ($this->pilihan_users as $user_id) {
            BudgetUser::create([
                'budget_id' => $budget->id,
                'user_id' => $user_id,
            ]);
        }

        session()->flash('message', 'Budget berhasil disimpan.');
        return redirect()->route('admin.budget');
    }

    public function render()
    {
        return view('livewire.admin.form-budget');
    }
}
