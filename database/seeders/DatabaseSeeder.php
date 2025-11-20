<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. User Admin (Agar kamu bisa login)
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@test.com',
            'no_hp' => '08123456789', // <-- Email untuk login
            'password' => Hash::make('password'), // <-- Password: "password"
            'role' => 'admin',
        ]);

        // 2. User Karyawan (Minimal 3-5 untuk testing alokasi)
        User::create([
            'name' => 'Karyawan Satu',
            'email' => 'karyawan1@test.com',
            'no_hp' => '08123456797',
            'password' => Hash::make('password'),
            'role' => 'karyawan',
        ]);
        User::create([
            'name' => 'Karyawan Dua',
            'email' => 'karyawan2@test.com',
            'no_hp' => '08123456798',
            'password' => Hash::make('password'),
            'role' => 'karyawan',
        ]);
        User::create([
            'name' => 'Karyawan Tiga',
            'email' => 'karyawan3@test.com',
            'no_hp' => '08123456799',
            'password' => Hash::make('password'),
            'role' => 'karyawan',
        ]);
        
    }
}