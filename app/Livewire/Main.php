<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Main extends Component
{
    #[Title('Dashboard Karyawan')]
    public function render()
    {
        return view('livewire.main');
    }
}
