<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        // Get an array of all user IDs
        $user_id = User::pluck('id')->toArray();
        $category_id = Category::pluck('id')->toArray();
        $articles = 20;

        for ($i = 0; $i < $articles; $i++) {
            $article =Article::create([
                'title' => $faker->sentence(3),
                'body' => '<p>' . $faker->text(500) . '</p>',
                'user_id'=>$faker->randomElement($user_id)
            ]);

            // Associate the article with random categories
            $random_category = $faker->randomElements($category_id, $faker->numberBetween(1, 3));
            $article->categories()->attach($random_category);

            // IMAGES
            // Generate a fake image URL (you can adjust the URL format)
            $fakeImageUrl = $faker->imageUrl(800, 600);
            // Download the fake image and store it in the media library
            $media = $article->addMediaFromUrl($fakeImageUrl)->toMediaCollection('article_image');
            // Optionally, set custom attributes for the media item (e.g., caption)
            $media->update();
        }
    }
}