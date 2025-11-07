<?php

namespace App\Livewire\Karyawan;

use App\Models\budgets;
use App\Models\transaction;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

class Transaksi extends Component
{
    #[ Title ('Transaksi Karyawan')]
    
   
    
    public function render()
    {
            return view('livewire.karyawan.transaksi', [
            'transaksi' => transaction::all(),
            'saldo' => budgets::where('id', 2)->first(),
        ]);
        
    }
}
