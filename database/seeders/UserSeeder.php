<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if a user with the 'admin' username already exists
        if (!User::where('username', 'admin')->exists()) {
            User::insert([
                [
                    'name' => 'admin',
                    'surname' => 'admin',
                    'username' => 'admin',
                    'email' => 'admin@email.com',
                    'password' => Hash::make('admin'),
                    'role' => 'admin'
                ]
            ]);
        }
    }
}

