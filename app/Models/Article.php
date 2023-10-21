<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Overtrue\LaravelLike\Traits\Likeable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Spatie\Translatable\HasTranslations;

class Article extends Model implements HasMedia, Searchable
{
    use interactsWithMedia, Likeable, softDeletes,HasTranslations;

    protected $guarded = [];
    protected $defaultLocale = 'en';
    public array $translatable = ['title', 'body','slug'];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_category', 'article_id', 'category_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('blog', $this->id);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            $url,
            [
                'title' => $this->title,
                'body'  => $this->body
            ]

        );
    }

//=================================== SLUG  =====================

    /**
     * This function is called when the model is being booted.
     * It registers an event listener for the "created" event.
     * When a new article is created, this event listener will be triggered.
     * The listener sets the slug attribute of the article to a slugified version of its title,
     * and then saves the article.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($article) {
            // Generate a slug for the article based on its title
            if (preg_match('/[^\x00-\x7F]/', $article->title)) {

              $slug=preg_replace('/\s+/u', '-', trim($article->title));
                $article->slug = $slug;
            } else {
                $article->slug = $article->createSlug($article->title);

                // Save the article with the updated slug
                $article->save();
            }

        });
    }


    /**
     * Create a slug from a given name.
     *
     * @param  string  $name  The name to create a slug from.
     *
     * @return string The created slug.
     */
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
}
