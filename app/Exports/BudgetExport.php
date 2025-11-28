<?php

namespace App\Exports;

use App\Models\budgets;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings; // Trait yang benar: WithHeadings (plural)
use Maatwebsite\Excel\Concerns\WithMapping;

// Kita harus mengimplementasikan semua interface dari trait yang kita gunakan
class BudgetExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Mengambil data dari database.
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // PERBAIKAN: 
        // 1. Query 'budgets::where(...)->get()' salah sintaks.
        // 2. Untuk memilih kolom spesifik, kita gunakan select().
        // 3. Asumsi Model-nya adalah Budget (kapital dan singular).
        return budgets::select(
            'id', 
            'name', 
            'total_amount', 
            'detail', 
            'start_date', 
            'end_date'
        )->get();
    }

    /**
     * Mendefinisikan baris header (judul kolom) di Excel.
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID', // Lebih baik kapital
            'NAMA BUDGET',
            'NOMINAL',
            'DETAIL',
            'TANGGAL MULAI',
            'TANGGAL SELESAI'
        ];
    }

    /**
     * Memetakan data dari Model ke baris Excel.
     * @param mixed $budget
     * @return array
     */
    // PERBAIKAN: Ubah nama variabel input menjadi $budget (singular)
    public function map($budget): array
    {
        return [
            $budget->id,
            $budget->name,
            $budget->total_amount,
            $budget->detail,
            
            // Opsional: Format tanggal agar lebih rapi
            $budget->start_date ? \Carbon\Carbon::parse($budget->start_date)->format('d-m-Y') : '-',
            $budget->end_date ? \Carbon\Carbon::parse($budget->end_date)->format('d-m-Y') : '-',
        ];
    }
}