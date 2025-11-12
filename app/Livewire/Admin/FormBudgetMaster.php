<?php

namespace App\Livewire\Admin;

use App\Models\budget_master;
use App\Models\BudgetMaster;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormBudgetMaster extends Component
{
    public $budget;
    public $tahun_anggaran;
    public $detail;
    
    public function mount(){
        //
    }

    public function simpan(){

        // dd(Auth::id());
        $this->validate([
            'budget' => 'required|numeric',
            'tahun_anggaran' => 'required|numeric',
            'detail' => 'required|string'
        ],[
            'budget.numeric' => 'Hanya Boleh Angka',
            'budget.required' => 'Harus Di isi!',
            'tahun-anggaran.required' => 'Harus Di isi',

        ]);

        BudgetMaster::create([
            'user_id' => Auth::id(),
            'budget' => $this->budget,
            'tahun_anggaran' => $this->tahun_anggaran,
            'detail' => $this->detail,
        ]);

        return redirect()->route('admin.budget');

    }
    
    public function render()
    {
        return view('livewire.admin.form-budget-master')->extends('layouts.admin');
    }
}
