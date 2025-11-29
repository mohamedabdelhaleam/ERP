<?php

namespace Database\Seeders;

use App\Models\JobTitle;
use Illuminate\Database\Seeder;

class JobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobTitles = [
            [
                'name' => 'Chief Executive Officer',
                'description' => 'Top executive responsible for overall company operations and strategy.',
                'is_active' => true,
            ],
            [
                'name' => 'Chief Technology Officer',
                'description' => 'Leads technology strategy and oversees IT operations.',
                'is_active' => true,
            ],
            [
                'name' => 'Chief Financial Officer',
                'description' => 'Manages financial planning, reporting, and strategy.',
                'is_active' => true,
            ],
            [
                'name' => 'HR Manager',
                'description' => 'Oversees human resources operations and employee relations.',
                'is_active' => true,
            ],
            [
                'name' => 'IT Manager',
                'description' => 'Manages IT infrastructure and technical teams.',
                'is_active' => true,
            ],
            [
                'name' => 'Finance Manager',
                'description' => 'Handles financial planning, budgeting, and accounting operations.',
                'is_active' => true,
            ],
            [
                'name' => 'Marketing Manager',
                'description' => 'Develops and executes marketing strategies and campaigns.',
                'is_active' => true,
            ],
            [
                'name' => 'Sales Manager',
                'description' => 'Leads sales team and manages customer relationships.',
                'is_active' => true,
            ],
            [
                'name' => 'Operations Manager',
                'description' => 'Oversees daily operations and process optimization.',
                'is_active' => true,
            ],
            [
                'name' => 'Software Developer',
                'description' => 'Designs, develops, and maintains software applications.',
                'is_active' => true,
            ],
            [
                'name' => 'Senior Software Developer',
                'description' => 'Experienced developer leading complex technical projects.',
                'is_active' => true,
            ],
            [
                'name' => 'Junior Software Developer',
                'description' => 'Entry-level developer working on software development tasks.',
                'is_active' => true,
            ],
            [
                'name' => 'System Administrator',
                'description' => 'Manages and maintains IT systems and infrastructure.',
                'is_active' => true,
            ],
            [
                'name' => 'Network Engineer',
                'description' => 'Designs and maintains network infrastructure.',
                'is_active' => true,
            ],
            [
                'name' => 'Accountant',
                'description' => 'Handles financial records, transactions, and reporting.',
                'is_active' => true,
            ],
            [
                'name' => 'Senior Accountant',
                'description' => 'Experienced accountant managing complex financial operations.',
                'is_active' => true,
            ],
            [
                'name' => 'Financial Analyst',
                'description' => 'Analyzes financial data and provides insights for decision-making.',
                'is_active' => true,
            ],
            [
                'name' => 'Marketing Specialist',
                'description' => 'Executes marketing campaigns and content creation.',
                'is_active' => true,
            ],
            [
                'name' => 'Digital Marketing Specialist',
                'description' => 'Manages online marketing channels and digital campaigns.',
                'is_active' => true,
            ],
            [
                'name' => 'Sales Representative',
                'description' => 'Builds relationships with customers and closes sales.',
                'is_active' => true,
            ],
            [
                'name' => 'Senior Sales Representative',
                'description' => 'Experienced sales professional handling key accounts.',
                'is_active' => true,
            ],
            [
                'name' => 'Customer Service Representative',
                'description' => 'Provides customer support and resolves inquiries.',
                'is_active' => true,
            ],
            [
                'name' => 'Customer Service Manager',
                'description' => 'Manages customer service team and operations.',
                'is_active' => true,
            ],
            [
                'name' => 'Operations Coordinator',
                'description' => 'Coordinates daily operations and administrative tasks.',
                'is_active' => true,
            ],
            [
                'name' => 'Project Manager',
                'description' => 'Plans, executes, and manages projects from start to finish.',
                'is_active' => true,
            ],
            [
                'name' => 'Business Analyst',
                'description' => 'Analyzes business processes and recommends improvements.',
                'is_active' => true,
            ],
            [
                'name' => 'Data Analyst',
                'description' => 'Analyzes data to provide business insights and reports.',
                'is_active' => true,
            ],
            [
                'name' => 'Quality Assurance Specialist',
                'description' => 'Tests products and processes to ensure quality standards.',
                'is_active' => true,
            ],
            [
                'name' => 'Administrative Assistant',
                'description' => 'Provides administrative support and office management.',
                'is_active' => true,
            ],
            [
                'name' => 'Executive Assistant',
                'description' => 'Provides high-level administrative support to executives.',
                'is_active' => true,
            ],
            [
                'name' => 'Legal Counsel',
                'description' => 'Provides legal advice and handles legal matters.',
                'is_active' => true,
            ],
        ];

        foreach ($jobTitles as $jobTitle) {
            JobTitle::create($jobTitle);
        }
    }
}
