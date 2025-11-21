<?php

namespace App\Exports;

use App\Models\budgets;
use Maatwebsite\Excel\Concerns\FromCollection;
use MaatWebsite\Excel\Concerns\WithHeading;
use MaatWebsite\Excel\Concerns\WithMapping;

class BudgetExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return budgets::where('id', 'name', 'total_amount', 'detail', 'start_date', 'end_date')->get();
    }

    public function heading(): array
    {
        return [
            'id',
            'nama budget',
            'nominal',
            'detail',
            'tanggal mulai',
            'tanggal selesai'
        ];
    }

    public function map($budgets): array
    {
        return [
            $budgets->id,
            $budgets->name,
            $budgets->total_amount,
            $budgets->detail,
            $budgets->start_date,
            $budgets->end_date,
            
        ];
    }
}
