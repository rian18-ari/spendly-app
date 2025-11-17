<?php

namespace App\Livewire\karyawan;

use App\Models\transaction; // Asumsi model transaksi bernama 'transaction'
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionChart extends Component // Nama class diubah
{
    public $labels = []; // Label: Tanggal (e.g., "15 Nov")
    public $data = [];   // Data: Total Amount/Pengeluaran
    public $userId = null;
    
    // Properti tambahan untuk digunakan di view
    public $chartTitle = 'Tren Pengeluaran 7 Hari Terakhir';

    public function mount()
    {
        // Tetap menggunakan user ID dari Auth jika tidak diset
        if (is_null($this->userId)) {
            $this->userId = Auth::id();
        }
        
        $this->loadChartData();
    }

    public function loadChartData()
    {
        $userId = $this->userId;
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subDays(6); // Total 7 hari

        // 1. Query: Ambil total 'amount', dikelompokkan per hari ('date')
        $dailyTransactions = transaction::query()
            // Kita anggap user_id dari foto adalah 1
            // Di sini kita gunakan user_id dari Auth
            ->where('user_id', $userId) 
            ->whereBetween('date', [$startDate, $endDate])
            ->select(
                'date',
                // Perhatikan: Menjumlahkan kolom 'amount'
                DB::raw('SUM(amount) as daily_amount') 
            )
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get()
            ->keyBy('date'); // Jadikan tanggal sebagai key (kunci)

        // 2. Siapkan array data untuk 7 hari (termasuk hari yang pengeluarannya 0)
        $this->labels = [];
        $this->data = [];

        // Loop dari 7 hari lalu sampai hari ini
        for ($date = $startDate->copy(); $date <= $endDate; $date->addDay()) {
            $dateString = $date->toDateString();
            
            // Tambahkan label dalam format tanggal dan bulan (e.g., "15 Nov")
            $this->labels[] = $date->format('d M'); 
            
            // Cek apakah ada transaksi di tanggal ini
            if (isset($dailyTransactions[$dateString])) {
                // Ambil total pengeluaran harian
                $this->data[] = (int) $dailyTransactions[$dateString]->daily_amount; 
            } else {
                // Jika tidak ada, pengeluarannya 0
                $this->data[] = 0;
            }
        }
    }

    public function render()
    {
        // Ganti nama view jika kamu menggunakan nama lain
        return view('livewire.karyawan.chart-view'); 
    }
}