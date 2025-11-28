<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\transaction;
use App\Models\User;

class EditTransaksi extends Component
{
    // data tidak akan muncul kalao ini tidak ada/dibuat
    public $note;
    public $amount;
    public $type;
    public $status;
    public $date;
    public $image;

    public transaction $transaksi;
    
    public function mount($id)
    {
        $this->transaksi = transaction::findOrFail($id);
        // data baru akan muncul di form edit setelah menambahan ini
        $this->note = $this->transaksi->note;
        $this->amount = $this->transaksi->amount;
        $this->type = $this->transaksi->type;
        $this->status = $this->transaksi->status;
        $this->date = $this->transaksi->date;
        $this->image = $this->transaksi->image;
    }

    public function update()
    {
        $this->validate([
            'note' => 'required',
            'amount' => 'required',
            'type' => 'required',
            'status' => 'required',
        ]);

        // dd($this);

        $this->transaksi->update([
            'note' => $this->note,
            'amount' => $this->amount,
            'type' => $this->type,
            'status' => $this->status,
            'date' => $this->date,
            'image' => $this->image,
        ]);

        session()->flash('success', 'Data berhasil diupdate');
        return redirect()->route('transaksiadmin');
        
    }
    
    public function render()
    {
        $userIds = User::find($this->transaksi->user_id);
        $userName = $userIds->name;
        // dd($userName);

        
        return view('livewire.admin.edit-transaksi', [
            'transaksi' => transaction::all(),
            'userName' => $userName
        ])->extends('layouts.admin');
    }
}
