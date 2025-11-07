<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Karyawanlist extends Component
{
    public function render()
    {
        return view('livewire.admin.karyawanlist', [
            'karyawans' => User::where('role', 'karyawan')->get(),
            'totalkaryawan' => user::all()->count(),
            'jeniskaryawan' => User::where('role', 'karyawan')->count(),
            'totaladmin' => User::where('role', 'admin')->count(),
        ]);
    }

    public function deleteKaryawan($id)
    {
        $karyawan = User::find($id);
        if ($karyawan) {
            $karyawan->delete();
            session()->flash('message', 'Karyawan berhasil dihapus.');
        } else {
            session()->flash('error', 'Karyawan tidak ditemukan.');
        }
    }
}
