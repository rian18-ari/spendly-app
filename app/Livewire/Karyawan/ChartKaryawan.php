<?php

namespace App\Livewire\Karyawan;

use App\Models\transaction;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChartKaryawan extends Component
{
    public $labels = [];   
    public $data = [];     
    public $userId = null;
    public $chartTitle = 'Tren Pengeluaran 7 Hari Terakhir';
    
    public $filterDays = 7; 

    public function mount()
    {
        $this->userId = Auth::id();
        $this->loadChartData();
    }

    public function loadChartData()
    {
        $userId = $this->userId;
        
        // Memastikan tipe data Integer (untuk mencegah error string - int)
        $filterData = (int) $this->filterDays; 
        
        $endDate = Carbon::today();
        
        // Rentang tanggal yang benar (misal: 7 - 1 = 6 hari ke belakang)
        $startDate = Carbon::today()->subDays($filterData - 1); 
        // dd($filterData);

        // Logika Query untuk Tren Harian
        $dailyTransactions = transaction::query()
            ->where('user_id', $userId) 
            ->whereBetween('date', [$startDate, $endDate])
            ->select(
                'date',
                DB::raw('SUM(amount) as daily_amount') 
            )
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get()
            ->keyBy('date');

        $this->labels = [];
        $this->data = [];

        // Loop untuk mengisi array untuk setiap hari dalam rentang
        for ($date = $startDate->copy(); $date <= $endDate; $date->addDay()) {
            $dateString = $date->toDateString();
            $this->labels[] = $date->format('d/M'); 
            $dailyAmount = $dailyTransactions[$dateString]->daily_amount ?? 0;
            $this->data[] = (int) $dailyAmount; 
        }
        
        // Update Judul Chart Sesuai Filter
        $this->chartTitle = 'Tren Pengeluaran ' . $this->filterDays . ' Hari Terakhir';

        // Mengirim event ke Alpine.js
        $this->dispatch('chart-data-updated', [
            'labels' => $this->labels,
            'data' => $this->data,
            'title' => $this->chartTitle, 
        ]);
    }
    
    public function updatedFilterDays()
    {
        $this->loadChartData();
    }

    public function render()
    {
        return view('livewire.karyawan.chart-karyawan'); 
    }
}