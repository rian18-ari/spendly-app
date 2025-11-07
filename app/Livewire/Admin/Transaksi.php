<?php

namespace App\Livewire\Admin;

use App\Models\budgets;
use App\Models\transaction;
use Livewire\Component;

class Transaksi extends Component
{
    public function render()
    {
        return view('livewire.admin.transaksi',  [
            'transaksi' => transaction::all(),
            'saldo' => budgets::where('id', 2)->first(),
        ]);
    }
}
