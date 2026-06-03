<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Admin
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@demo.com',
            'password' => Hash::make('password123'),
            'role'     => 'admin',
            'no_hp'    => '08123456789',
        ]);

        // Akun User Biasa
        User::create([
            'name'     => 'User Biasa',
            'email'    => 'user@demo.com',
            'password' => Hash::make('password123'),
            'role'     => 'user',
            'no_hp'    => '08987654321',
        ]);
    }
}