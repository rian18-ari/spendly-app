<?php

namespace App\Livewire\Admin;

use App\Models\budgetmaster;
use App\Models\transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard' ,[
            // 'user' => Auth::user()->id,
            'budget_master' => budgetmaster::all(),
            'total_pengeluaran' => transaction::where('type', 'pengeluaran')->sum('amount'),
            'pengguna' => User::all()->count()
            // dd($budgetmaster)
        ]);
    }
}
