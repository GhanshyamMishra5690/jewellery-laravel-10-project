<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Ghanshyam Mishra',
            'email' => 'admin@gmail.com', 
            'userType' => 'admin',
            'status' => 1,
            'password' => Hash::make('12345678'),
        ]);
        \App\Models\User::create([
            'name' => 'Regular User',
            'email' => 'regular@gmail.com', 
            'userType' => 'user',
            'status' => 1,
            'password' => Hash::make('12345678'),
        ]);
        \App\Models\User::create([
            'name' => 'Wholesaler',
            'email' => 'saler@gmail.com', 
            'userType' => 'wholesaler',
            'status' => 1,
            'password' => Hash::make('12345678'),
        ]);
    }
}
