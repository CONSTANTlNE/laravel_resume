<?php

namespace App\Traits;

use App\Models\Article;

trait ArticleTrait{

    public function getArticles($category){

     return  Article::with('media', 'categories', 'users')
            ->whereHas('categories', function ($query) use ($category) {
                $query->where('categories.slug', $category);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

    }

}