<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use MaatWebsite\Excel\Concerns\WithHeading;
use MaatWebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::where('id', 'name', 'email', 'no_hp', 'role');
    }

    public function heading(): array
    {
        return [
            'id',
            'nama',
            'email',
            'No. HP',
            'role',
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->no_hp,
            $user->role,
        ];
    }
}
