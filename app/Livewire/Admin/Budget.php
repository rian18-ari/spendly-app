<?php

namespace App\Livewire\Admin;

use App\Models\budgets;
use Livewire\Component;

class Budget extends Component
{
    public function deletebudget($id)
    {
        $budget = budgets::find($id);
        if ($budget) {
            $budget->delete();
            session()->flash('message', 'Budget berhasil dihapus.');
        } else {
            session()->flash('error', 'Budget tidak ditemukan.');
        }
    }
    
    public function render()
    {
        return view('livewire.admin.budget',[
            'title' => 'Budget Management',
            'budgets' => budgets::all(),
        ]);
    }
}
