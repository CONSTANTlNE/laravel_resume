<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create(
            ['project_name'=>'Multy Step Form',
             'project_url'=>'https://constantlne.github.io/multi-step-form/',
             'code_url'=>'https://github.com/CONSTANTlNE/multi-step-form',
            ]);
        Project::create(
            ['project_name'=>'News Homepage',
             'project_url'=>'https://constantlne.github.io/Frontendmentor-news-homepage/',
             'code_url'=>'https://github.com/CONSTANTlNE/Frontendmentor-news-homepage',
            ]);
        Project::create(
            ['project_name'=>'Results Summary',
             'project_url'=>'https://constantlne.github.io/-frontendmentor-results-summary/',
             'code_url'=>'https://github.com/CONSTANTlNE/-frontendmentor-results-summary',
            ]);
        Project::create(
            ['project_name'=>'Designo Multi-Page Website',
             'project_url'=>'https://constantlne.github.io/Front_end_mentor-MultyPageWebsite/',
             'code_url'=>'https://github.com/CONSTANTlNE/Front_end_mentor-MultyPageWebsite',
            ]);
        Project::create(
            ['project_name'=>'Stats Preview',
             'project_url'=>'https://constantlne.github.io/stats-preview/',
             'code_url'=>'https://github.com/CONSTANTlNE/stats-preview',
            ]);
    }
}
