<?php

namespace Database\Seeders;

use App\Models\SkillName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        SkillName::create(['skill_name'=>'PHP']);
        SkillName::create(['skill_name'=>'HTML']);
        SkillName::create(['skill_name'=>'JS']);
        SkillName::create(['skill_name'=>'CSS']);
        SkillName::create(['skill_name'=>'LARAVEL']);

    }
}
