<?php

namespace App\Livewire\Admin;

use App\Models\budgetmaster;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard' ,[
            'user' => User::find(Auth::id()),
            'budgetmaster' => budgetmaster::first('budget')
        ]);
    }
}
