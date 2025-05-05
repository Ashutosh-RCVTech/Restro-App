<?php

namespace Database\Seeders;

// database/seeders/AdminUserSeeder.php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'), // change later
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
