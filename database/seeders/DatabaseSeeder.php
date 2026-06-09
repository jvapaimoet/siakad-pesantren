<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'adminSIPES',
            'email' => 'admin@gmail.com',
            // Kita panggil langsung path lengkapnya di sini:
            'password' => \Illuminate\Support\Facades\Hash::make('password123'),   
        ]);
    }
}