<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory([1])->create();

        \App\Models\User::factory()->create([
            // 'name' => 'Admin',
            // 'email' => 'Admin@gmail.com',
            'remember_token' => str::random(10),
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phoneNumber' => '012045789',
            'address' => "admin address",
            'type' => 'admin',
            'addedBy' => "1",
            'email_verified_at' => now(),
            'password' => bcrypt('123456123'),

        ]);
    }
}
