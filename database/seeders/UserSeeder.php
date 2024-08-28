<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if the user already exists before creating
        if (!User::where('email', 'admin@admin.com')->exists()) {
            User::create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                "email_verified_at" => '2024-08-28 15:38:53',
                'password' => Hash::make('password'),
                'remember_token' => 'gI5fE43mQN',
                'created_at' => '2024-08-28 15:38:53',
                'updated_at' => '2024-08-28 15:38:53',
            ]);
        }
    }
}
