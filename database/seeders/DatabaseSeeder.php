<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Users
        $this->call(UserSeeder::class);

        // Seed Departments
        $this->call(DepartmentSeeder::class);

        // Seed Job Titles
        $this->call(JobTitleSeeder::class);

        // Seed Employees (200 records)
        $this->call(EmployeeSeeder::class);
    }
}
