<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_category', 'category_id', 'article_id');
    }


    protected static function boot()
    {
        parent::boot();

        static::created(function ($category) {
            // Generate a slug for the article based on its title
            $category->slug = $category->createSlug($category->name);

            // Save the article with the updated slug
            $category->save();
        });
    }

    private function createSlug($slug)
    {
        // Check if a record with the same slug already exists
        if (static::whereSlug($slug = Str::slug($slug))->exists()) {

            // Get the highest slug number for records with the same name
            $max = static::whereSlug($slug)->latest('id')->skip(1)->value('slug');

            // If the highest slug number ends with a number, increment it
            if (isset($max[-1]) && is_numeric($max[-1])) {

                // Use preg_replace_callback to increment the number at the end of the slug
                return preg_replace_callback('/(\d+)$/', function ($mathces) {

                    // Increment the number and return the new slug
                    return $mathces[1] + 1;
                }, $max);
            }

            // If the highest slug number does not end with a number, append "-2" to the slug
            return "{$slug}-2";
        }

        // If no record with the same slug exists, return the slug as is
        return $slug;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function metas()
    {
        return $this->morphMany(Meta::class, 'metaable');
    }
}
