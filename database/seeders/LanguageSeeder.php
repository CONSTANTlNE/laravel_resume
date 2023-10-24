<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Language::create(
            ['abbr' => 'ge',
             'languages' => 'Georgian']);
        Language::create(
            ['abbr' => 'en',
             'languages' => 'English']);

    }
}