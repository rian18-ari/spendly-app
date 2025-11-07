<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Tambahkaryawan extends Component
{
    public $name;
    public $email;
    public $password;
    public $role;

    public function store()
    {
        // dd($this->all());
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,karyawan',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role' => $this->role,
        ]);

        session()->flash('message', 'Karyawan berhasil ditambahkan.');
        return redirect()->route('admin.karyawan');
    }
    
    
    public function render()
    {
        return view('livewire.admin.tambahkaryawan');
    }
}
