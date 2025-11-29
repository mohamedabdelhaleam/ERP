<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Human Resources',
                'description' => 'Manages employee relations, recruitment, and organizational development.',
                'is_active' => true,
            ],
            [
                'name' => 'Information Technology',
                'description' => 'Handles all technology infrastructure, software development, and technical support.',
                'is_active' => true,
            ],
            [
                'name' => 'Finance',
                'description' => 'Manages financial planning, accounting, and budgeting.',
                'is_active' => true,
            ],
            [
                'name' => 'Marketing',
                'description' => 'Responsible for brand management, advertising, and market research.',
                'is_active' => true,
            ],
            [
                'name' => 'Sales',
                'description' => 'Handles customer acquisition, sales operations, and revenue generation.',
                'is_active' => true,
            ],
            [
                'name' => 'Operations',
                'description' => 'Manages day-to-day business operations and process improvement.',
                'is_active' => true,
            ],
            [
                'name' => 'Customer Service',
                'description' => 'Provides customer support and maintains customer relationships.',
                'is_active' => true,
            ],
            [
                'name' => 'Research and Development',
                'description' => 'Focuses on innovation, product development, and research activities.',
                'is_active' => true,
            ],
            [
                'name' => 'Legal',
                'description' => 'Handles legal matters, compliance, and contract management.',
                'is_active' => true,
            ],
            [
                'name' => 'Administration',
                'description' => 'Manages administrative tasks, facilities, and office operations.',
                'is_active' => true,
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
