<?php

namespace App\Exports;

use App\Models\transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransaksiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return transaction::select('id', 'amount', 'note', 'date', 'type', 'status')->get();
    }

    public function heading(): array
    {
        return [
            'id',
            'nominal',
            'nama transaksi',
            'tanggal',
            'tipe',
            'status'
        ];
    }

    public function map($transaction): array
    {
        return [
            $transaction->id,
            $transaction->amount,
            $transaction->note,
            $transaction->date,
            $transaction->type,
            $transaction->status,
            
        ];
    }
}
