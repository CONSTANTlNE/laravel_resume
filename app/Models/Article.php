<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelLike\Traits\Likeable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Laravel\Scout\Searchable;

class Article extends Model implements HasMedia
{
    use interactsWithMedia,Searchable,Likeable;
    protected $guarded=[];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_category', 'article_id', 'category_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function toSearchableArray()
    {
        return [
            'id' =>  $this->id,
            'article' => $this->body,
            'header' => $this->title,
        ];
    }

}
