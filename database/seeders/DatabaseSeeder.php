<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@uhamka.ac.id',
            'password' => bcrypt('123123'), // Pastikan untuk mengenkripsi password
            'role' => 'admin', // Menetapkan peran sebagai admin
        ]);
    }
}
