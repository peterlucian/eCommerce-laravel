<?php

namespace Database\Seeders;

use App\Models\User;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password'=> Hash::make('password'),
            'role'=> 'admin',
        ]);

        User::factory()->create([
            'name' => 'Agent',
            'email' => 'agent@example.com',
            'password'=> Hash::make('password'),
            'role'=> 'agent',
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password'=> Hash::make('password'),
            'role'=> 'user',
        ]);

        //$this->call(ItemSeeder::class);
        //$this->call(ImagePathSeeder::class);
    }
}
