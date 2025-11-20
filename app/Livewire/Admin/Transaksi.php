<?php

namespace App\Livewire\Admin;

use App\Exports\TransaksiExport;
use App\Models\budgets;
use App\Models\transaction;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Transaksi extends Component
{
    public function export()
    {
        return Excel::download(new TransaksiExport, 'data-transaksi-'.now()->timestamp.'.xlsx');
    }
    
    public function render()
    {
        return view('livewire.admin.transaksi',  [
            'transaksi' => transaction::all(),
            'flowtransaksi' => transaction::all()->count(),
        ]);
    }
}
