<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\transaction;

class EditTransaksi extends Component
{
    // data tidak akan muncul kalao ini tidak ada/dibuat
    public $note;
    public $amount;
    public $type;
    public $budget_id;
    public $user_id;
    public $date;
    public $id;
    public $transaksi;
    
    public function mount($id)
    {
        $this->transaksi = transaction::findOrFail($id);
        // data baru akan muncul di form edit setelah menambahan ini
        $this->note = $this->transaksi->note;
        $this->amount = $this->transaksi->amount;
        $this->type = $this->transaksi->type;
        $this->budget_id = $this->transaksi->budget_id;
        $this->user_id = $this->transaksi->user_id;
        $this->date = $this->transaksi->date;
    }
    
    public function render()
    {
        return view('livewire.admin.edit-transaksi')->extends('layouts.admin');
    }
}
