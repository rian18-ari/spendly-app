<?php

namespace App\Livewire\Admin;

use App\Models\budgets;
use Livewire\Component;

class EditBudget extends Component
{
    public ?budgets $budgetId = null;
    
    public $name;
    public $total_amount;
    public $detail;
    public $start_date;
    public $end_date;
    
    public function mount($id)
    {
        $this->budgetId = budgets::findOrFail($id);
        $this->name = $this->budgetId->name;
        $this->total_amount = $this->budgetId->total_amount;
        $this->detail = $this->budgetId->detail;
        $this->start_date = $this->budgetId->start_date;
        $this->end_date = $this->budgetId->end_date;
    }

    public function update(){

        $validated = $this->validate([
            'total_amount' => 'required',
        ]);

        $this->budgetId->update($validated);

        return redirect()->route('admin.budget');
    }
    
    public function render()
    {
        return view('livewire.admin.edit-budget', [
            'databudget' => budgets::all(),
        ]);
    }
}
