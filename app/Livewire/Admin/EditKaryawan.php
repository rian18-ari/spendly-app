<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class EditKaryawan extends Component
{
    public $name;
    public $role;
    
    public ?User $user = null;


    public function mount($id)
    {
        $this->user = User::findOrFail($id);
        
        $this->name = $this->user->name; 
        $this->role = $this->user->role;
    }

    public function update()
    {
        if (is_null($this->user)) {
             session()->flash('error', 'Kesalahan: Data karyawan tidak tersedia untuk diperbarui.');
             return redirect()->route('admin.karyawan');
        }
        
        $validatedData = $this->validate([
            'name' => 'required|string|max:255', 
            'role' => 'required|string|in:admin,karyawan',
        ]);

        $this->user->update($validatedData);

        session()->flash('message', 'Karyawan **'.$this->user->name.'** berhasil diperbarui!');

        return redirect()->route('admin.karyawan');
    }
    
    public function render()
    {
        return view('livewire.admin.edit-karyawan', [
            'datakaryawan' => User::all() 
        ])->extends('layouts.admin');
    }
}