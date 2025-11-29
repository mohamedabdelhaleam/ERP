<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'phone' => '01000000001',
                'password' => Hash::make('12345678'),
                'is_active' => true,
            ],
            [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'phone' => '01000000002',
                'password' => Hash::make('12345678'),
                'is_active' => true,
            ],
            [
                'name' => 'Manager User',
                'email' => 'manager@example.com',
                'phone' => '01000000003',
                'password' => Hash::make('12345678'),
                'is_active' => true,
            ],
            [
                'name' => 'Inactive User',
                'email' => 'inactive@example.com',
                'phone' => '01000000004',
                'password' => Hash::make('12345678'),
                'is_active' => false,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
