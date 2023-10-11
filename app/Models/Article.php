<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelLike\Traits\Likeable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Article extends Model implements HasMedia,Searchable
{
    use interactsWithMedia,Likeable;
    protected $guarded=[];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_category', 'article_id', 'category_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('blog', $this->id);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            $url,
            [
                'title'=>$this->title,
                'body'=>$this->body
            ]

        );
    }
}
