<?php

namespace App\Livewire\Karyawan;

use App\Models\budgets;
use App\Models\transaction;
use Livewire\Component;

class FormTransaksi extends Component
{
    public $amount;
    public $note;
    public $date;
    public $type;
    public $budget_id;
    public $category_id;

    
    
    public function store()
    {
        // dd('masuk');
        
        $this->Validate([
            'amount' => 'required|numeric',
            'note' => 'required|string',
            'type' => 'required|in:income,expense',
            'date' => 'required|date',
        ],[
            'amount.required' => 'Jumlah transaksi wajib diisi.',
            'amount.numeric' => 'Jumlah transaksi harus berupa angka.',
            'note.required' => 'Catatan wajib diisi.',
            'note.string' => 'Catatan harus berupa teks.',
            'date.required' => 'Tanggal wajib diisi.',
            'date.date' => 'Tanggal tidak valid.',
        ]);

        // Menyimpan data transaksi
        
        transaction::create([
            'category_id' => $this->auth()->id(), // Ganti dengan logika yang sesuai untuk mendapatkan category_id
            'budget_id' => '2', // Ganti dengan logika yang sesuai untuk mendapatkan budget_id
            'amount' => $this->amount,
            'note' => $this->note,
            'type' => $this->type,
            'date' => $this->date,
        ]);

        // Memperbarui total_amount pada tabel budgets

        $budget = budgets::find(2); // Ganti dengan logika yang sesuai untuk mendapatkan budget_id

        if ($this->type === 'expense') {
            $budget->total_amount -= $this->amount;
        } else {
            $budget->total_amount += $this->amount;
        }

        // Simpan perubahan pada budget

        $budget->save();

        
        session()->flash('message', 'Transaksi berhasil ditambahkan.');
        return redirect()->route('transaksi');
    }

    // public function store () 
    // {
    //     dd($this->all());
    // }

    public function render()
    {
        return view('livewire.karyawan.form-transaksi');
    }
}
