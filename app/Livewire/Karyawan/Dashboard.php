<?php

namespace App\Livewire\Karyawan;

use Livewire\Component;
use App\Models\budgets;
use App\Models\transaction;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.karyawan.dashboard', [
            'title' => 'Dashboard Karyawan',
            'balance' => budgets::first('total_amount'),
            'total_pengeluaran' => transaction::where('type', 'expense')->sum('amount'),

        ]);
    }
}
