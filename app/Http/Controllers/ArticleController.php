<?php

namespace App\Http\Controllers;


use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use Spatie\Searchable\Search;

class ArticleController extends Controller
{

    private $recent_articles;
    private $categories;

    public function __construct()
    {
        $this->recent_articles = Article::orderBy('created_at', 'desc')->take(5)->get();
        $this->categories      = Category::withCount('articles')->get();
    }


    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $articles = Article::with('media', 'categories', 'users')
            ->orderBy('created_at', 'desc')->paginate(5);

        return view('blog.blog', compact('articles'))
            ->with('categories', $this->categories)
            ->with('recent_articles', $this->recent_articles);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create_article')->with('categories', $this->categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {

//        dd($request->title_ge);

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



        if(!empty($request->title_ge)&&!empty($request->body_ge)){
        $slug_ge=preg_replace('/\s+/u', '-', trim($request->title_ge));
        $article->setTranslation('slug','ge', $slug_ge);
        $article->setTranslation('title','ge',$request->title_ge);
        $article->setTranslation('body','ge',$request->body_ge );
        $article->save();
        }


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($locale,$slug)
    {
//        dd($slug);
        $article= Article::with('media', 'categories', 'users')->where('slug->'.$locale, $slug)->first();

        return view('blog.blog-details')
            ->with('categories', $this->categories)
            ->with('recent_articles', $this->recent_articles)
            ->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($locale,$slug)
    {
        $article= Article::with('media', 'categories', 'users')->where('slug->en', $slug)->first();
        $categories       = Category::all();
        $article_category = $article->categories->pluck('id')->toArray();

        return view('admin.blog.edit_article',
            compact('article', 'categories', 'article_category'));
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
    public function destroy($locale,$slug)
    {
//        dd($request->slug);
        if (auth()->user()->hasRole('admin')) {
            $article= Article::where('slug->'.$locale, $slug)->firstOrFail();
//            dd($article);
            $article->delete();
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function categories($locale, $category)
    {

        $articles = Article::with('media', 'categories', 'users')
            ->whereHas('categories', function ($query) use ($category) {
                $query->where('categories.slug', $category);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('blog.blog', compact('articles'))
            ->with('recent_articles', $this->recent_articles)
            ->with('categories', $this->categories);
    }

    public function users($locale,$slug)
    {
//        dd($slug);

        $articles = Article::with('media', 'categories', 'users')
            ->whereHas('users', function ($query) use ($slug) {
                $query->where('users.slug', $slug);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('blog.blog', compact('articles'))
            ->with('categories', $this->categories)
            ->with('recent_articles', $this->recent_articles);
    }


    public function search(Request $request)
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

        return view('blog.blog', compact('articles'))
            ->with('categores', $this->categories)
            ->with('recent_articles', $this->recent_articles);
    }


    public function deleted()
    {

        $articles = Article::onlyTrashed()
            ->with('media', 'categories', 'users')
            ->orderBy('deleted_at', 'desc')->get();

        return view('admin.blog.soft_deleted', compact('articles'))
            ->with('categories', $this->categories);

    }


    public function restoreArticle( $locale,$slug )
    {
//        dd($article);

        $article = Article::onlyTrashed()->where('slug->en',$slug);
        $article->restore();

        return redirect()->back();
    }

    public function deleteArticle($locale,$slug )
    {

        $article = Article::onlyTrashed()->where('slug->en',$slug);
        $article->forceDelete();

        return redirect()->back();
    }

}
