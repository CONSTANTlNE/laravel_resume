<?php

namespace App\Http\Controllers;


use App\Http\Requests\ArticleRequestIndex;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;

use App\Services\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Spatie\Searchable\Search;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ArticleService $articleService)
    {
       return $articleService->getArticles($request);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.blog.create_article', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {

        // Create the article
        $articleData = [
            'title' => $request->title,
            'body'  => $request->body,
        ];

// Create and save the article, and associate it with the authenticated user
        $user    = Auth::user();
        $article = $user->articles()->create($articleData);

        // Attach the selected categories to the article
        $article->categories()->attach($request->input('categories'));

        // Handle the article photo upload
        if ($request->hasFile('article_photo')) {
            $article->addMediaFromRequest('article_photo')->toMediaCollection('article_image');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $categories      = Category::withCount('articles')->get();
        $recent_articles = Article::orderBy('created_at', 'desc')->take(4)->get();

        return view('blog.blog-details',
            compact('article', 'recent_articles', 'categories'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $article_category=$article->categories->pluck('id')->toArray();


        return view('admin.blog.edit_article',
            compact('article', 'categories','article_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        // Create the article
        $articleData = [
            'title' => $request->title,
            'body'  => $request->body,
        ];

        $article->update($articleData);


        // Detach old categories first
        $article->categories()->detach();
        // Attach the selected categories to the article
        $article->categories()->attach($request->input('categories'));

        // Handle the article photo upload
        $media = $article->getMedia('article_image')->first();
        if ($request->hasFile('article_photo')) {
            if (isset($media)) {
                $media->delete();
            }
            $article->addMediaFromRequest('article_photo')->toMediaCollection('article_image');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): \Illuminate\Http\RedirectResponse
    {

        if (auth()->user()->hasRole('admin')) {
            $article->delete();

            return redirect()->back();
        } else {
            abort(403);
        }
    }


}
