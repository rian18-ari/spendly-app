<?php

namespace App\Livewire\Admin;

use App\Exports\BudgetExport;
use App\Models\BudgetMaster;
use App\Models\budgetmaster as ModelsBudgetmaster;
use App\Models\budgets;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Budget extends Component
{
     public function export()
    {
        return Excel::download(new BudgetExport, 'data-budget-'.now()->timestamp.'.xlsx');
    }
    
    public function deletebudget($id)
    {
        dd($id);
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
            'budget_master' => ModelsBudgetmaster::all(),
            'totalBudget' => budgets::all()->count(),
        ])->extends('layouts.admin');
    }
}
