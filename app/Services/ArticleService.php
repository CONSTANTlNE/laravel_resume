<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleService

{
    public function getArticles(Request $request)
    {
//        dd($request);
        $categories      = Category::withCount('articles')->get();
        $recent_articles = Article::orderBy('created_at', 'desc')->take(5)->get();

        if ($request->routeIs('blog') && $request->has('user')) {
            return $this->getArticlesByUser($request, $categories, $recent_articles);
        } elseif ($request->routeIs('show_category')) {
            return $this->getArticlesByCategory($request, $categories, $recent_articles);
        } elseif ($request->routeIs('article_list')) {
            return $this->getAllArticlesAdmin($categories, $recent_articles);
        } elseif ($request->routeIs('search')) {
            return $this->searchArticles($request, $categories, $recent_articles);
        } else {
            return $this->getAllArticles($categories, $recent_articles);
        }

    }

    private function getArticlesByUser($request, $categories, $recent_articles)
    {
        $id       = $request->user;
        $articles = Article::with('media', 'categories', 'users')
            ->whereHas('users', function ($query) use ($id) {
                $query->where('users.id', $id);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('blog.blog',compact('articles', 'recent_articles', 'categories'),);
    }

    private function getArticlesByCategory($request, $categories, $recent_articles)
    {
        $id       = $request->category;
        $articles = Article::with('media', 'categories', 'users')
            ->whereHas('categories', function ($query) use ($id) {
                $query->where('categories.id', $id);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('blog.blog',compact('articles', 'recent_articles', 'categories')) ;
    }

    private function getAllArticles($categories, $recent_articles)
    {
        $articles = Article::with('media', 'categories', 'users')
            ->orderBy('created_at', 'desc')->paginate(5);

        return view('blog.blog',compact('articles', 'categories', 'recent_articles')) ;
    }

    private function getAllArticlesAdmin($categories, $recent_articles)
    {
        $articles = Article::with('media', 'categories', 'users')
            ->orderBy('created_at', 'desc')->paginate(5);


        return view('admin.blog.view_articles', compact('articles', 'categories', 'recent_articles'));
    }

    private function searchArticles($request, $categories, $recent_articles)
    {
        $query    = $request->input('query');
        $results  = (new Search())
            ->registerModel(Article::class, ['title', 'body'])
            ->search($query);
        $modelIds = $results->map(function ($searchResult) {
            return $searchResult->searchable->id;
        })->toArray();

        $articles = Article::with('media', 'categories', 'users')
            ->orderBy('created_at', 'desc')
            ->whereIn('id', $modelIds)
            ->paginate(5);

        return view('blog.blog',compact('articles', 'categories', 'recent_articles'));
    }
}
