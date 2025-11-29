<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Department;
use App\Models\JobTitle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = Department::pluck('id')->toArray();
        $jobTitles = JobTitle::pluck('id')->toArray();

        $firstNames = [
            'Ahmed',
            'Mohamed',
            'Ali',
            'Hassan',
            'Omar',
            'Khaled',
            'Youssef',
            'Mahmoud',
            'Ibrahim',
            'Abdullah',
            'Sara',
            'Fatima',
            'Aisha',
            'Mariam',
            'Nour',
            'Layla',
            'Zainab',
            'Hala',
            'Rania',
            'Dina',
            'John',
            'Michael',
            'David',
            'James',
            'Robert',
            'William',
            'Richard',
            'Joseph',
            'Thomas',
            'Charles',
            'Mary',
            'Patricia',
            'Jennifer',
            'Linda',
            'Elizabeth',
            'Barbara',
            'Susan',
            'Jessica',
            'Sarah',
            'Karen',
            'Nancy',
            'Lisa',
            'Betty',
            'Margaret',
            'Sandra',
            'Ashley',
            'Kimberly',
            'Emily'
        ];

        $lastNames = [
            'Ali',
            'Hassan',
            'Ahmed',
            'Mohamed',
            'Ibrahim',
            'Omar',
            'Khaled',
            'Mahmoud',
            'Youssef',
            'Abdullah',
            'Smith',
            'Johnson',
            'Williams',
            'Brown',
            'Jones',
            'Garcia',
            'Miller',
            'Davis',
            'Rodriguez',
            'Martinez',
            'Hernandez',
            'Lopez',
            'Wilson',
            'Anderson',
            'Thomas',
            'Taylor',
            'Moore',
            'Jackson',
            'Martin',
            'Lee',
            'Thompson',
            'White',
            'Harris',
            'Sanchez',
            'Clark',
            'Ramirez',
            'Lewis',
            'Robinson',
            'Walker',
            'Young'
        ];

        $statuses = ['active', 'active', 'active', 'active', 'inactive', 'terminated']; // More active than inactive/terminated

        for ($i = 0; $i < 200; $i++) {
            $firstName = $firstNames[array_rand($firstNames)];
            $lastName = $lastNames[array_rand($lastNames)];
            $email = strtolower($firstName . '.' . $lastName . ($i > 0 ? $i : '') . '@example.com');

            // Ensure unique email
            while (Employee::where('email', $email)->exists()) {
                $email = strtolower($firstName . '.' . $lastName . $i . rand(1000, 9999) . '@example.com');
            }

            $hireDate = now()->subYears(rand(0, 10))->subMonths(rand(0, 11))->subDays(rand(0, 30));
            $birthDate = now()->subYears(rand(22, 60))->subMonths(rand(0, 11))->subDays(rand(0, 30));

            Employee::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'phone' => '01' . rand(0, 9) . rand(10000000, 99999999),
                'national_id' => rand(10000000000000, 99999999999999),
                'birth_date' => $birthDate,
                'hire_date' => $hireDate,
                'address' => rand(0, 1) ? 'Address ' . rand(1, 100) . ', Street ' . rand(1, 50) . ', City' : null,
                'department_id' => !empty($departments) ? $departments[array_rand($departments)] : null,
                'job_title_id' => !empty($jobTitles) ? $jobTitles[array_rand($jobTitles)] : null,
                'status' => $statuses[array_rand($statuses)],
            ]);
        }
    }
}
