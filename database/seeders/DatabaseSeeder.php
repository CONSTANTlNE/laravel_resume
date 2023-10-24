<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
           User::factory(20)->create();

//         \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);

        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(HeroSectionSeeder::class);
        $this->call(SkillNameSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(LanguageSeeder::class);



    }
}
