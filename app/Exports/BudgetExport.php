<?php

namespace App\Exports;

use App\Models\budgets;
use Maatwebsite\Excel\Concerns\FromCollection;

class BudgetExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return budgets::all();
    }
}
