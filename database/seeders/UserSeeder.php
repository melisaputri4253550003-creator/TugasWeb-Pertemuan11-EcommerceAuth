<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin E-Commerce',
            'email' => 'admin@ecommerce.test',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Editor E-Commerce',
            'email' => 'editor@ecommerce.test',
            'password' => Hash::make('password123'),
            'role' => 'editor',
        ]);

        User::create([
            'name' => 'User E-Commerce',
            'email' => 'user@ecommerce.test',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}