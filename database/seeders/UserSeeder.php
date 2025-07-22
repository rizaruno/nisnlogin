<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'nisn' => '123456',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name' => 'Guru Bahasa',
            'nisn' => '234567',
            'email' => 'guru@example.com',
            'role' => 'guru',
            'password' => Hash::make('guru123'),
        ]);

        User::create([
            'name' => 'Siswa A',
            'nisn' => '345678',
            'email' => 'siswa@example.com',
            'role' => 'siswa',
            'password' => Hash::make('siswa123'),
        ]);
    }
}