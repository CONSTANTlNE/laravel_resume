<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $categories  = Category::withCount('articles')->get();
        $recent_articles = Article::orderBy('created_at', 'desc')->take(5)->get();

        //Show articles by User
        $users=User::all();
        if(request()->routeIs('blog') && request()->has('user')){

            $id=$request->user;
//            dd($id);
            $articles = Article::with('media', 'categories', 'users')
                ->whereHas('users', function ($query) use ($id) {
                    $query->where('users.id', $id);
                })->paginate(5);
//            dd($request->category);
            return  view('blog.blog',compact('articles','recent_articles','categories'));

        }

        // Recent Articles
        if(request()->routeIs('blog')){
            $articles = Article::with('media', 'categories', 'users')->paginate(4);

            return  view('blog.blog',compact('articles','recent_articles','categories'));
        }


        // Show articles within chosen category

        if(request()->routeIs('show_category')){

            $id=$request->category;
            $articles = Article::with('media', 'categories', 'users')
                ->whereHas('categories', function ($query) use ($id) {
                    $query->where('categories.id', $id);
                })->paginate(5);
//            dd($request->category);
            return  view('blog.blog',compact('articles','recent_articles','categories'));

        }



    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create_article');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Create the article
        $articleData = [
            'title' => $request->title,
            'body' => $request->body,
        ];

// Create and save the article, and associate it with the authenticated user
        $user = Auth::user();
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
        $categories  = Category::withCount('articles')->get();
        $recent_articles = Article::orderBy('created_at', 'desc')->take(4)->get();

       return view('blog.blog-details',compact('article','recent_articles','categories'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {

          return view('admin.blog.edit_article',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        // Create the article
        $articleData = [
            'title' => $request->title,
            'body' => $request->body,
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

        $article->delete();
        return redirect()->back();
    }

 public function search(Request $request){

       $search=Article::search($request);

       return view('blog.blog',compact('search'));
 }


}
