<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class SoftDeleteController extends Controller
{

    public function restoreArticle(Article $article)
    {
        $article->restore();
        return redirect('view_articles');
    }

    public function deleteArticle(Article $article)
    {
//        dd($article);
        $article->forceDelete();
        return redirect()->back();
    }
}
