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
            // Admin User
            User::create([
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'nama_user' => 'Aris Wahyudi',
            ]);
    
    }
}
