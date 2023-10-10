<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define an array of specific skill data
        $hero = [
            'greeting' => "Nice to meet you! I'm Constantine.",
            'text' => 'Based in Georgia, I’m a self-taught developer. Passionate about web technologies and eager to learn new things.',
            'header_text' => 'Constantine',
            'email' => 'gmta.constantine@gmail.com',
            'created_at' => now(),
            // Add more skills as needed
        ];

        // Insert the specific data into the skills table
        HeroSection::insert($hero);
    }
}
