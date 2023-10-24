<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Language;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.index');
    }

    public function users()
    {

        $users = User::with('roles', 'articles')->withCount('articles')->get();

        return view('admin.admin_pages.users', compact('users'));

    }

    public function articles()
    {
        $categories = Category::withCount('articles')->get();
        $articles   = Article::with('media', 'categories', 'users')
            ->orderBy('created_at', 'desc')->get();

        return view('admin.blog.view_articles', compact('articles', 'categories'));
    }

    public function settings()
    {

        $languages = Language::all();

        return view('admin.admin_pages.site_settings', compact('languages'));
    }

    public function langDestroy(Language $language)
    {
        $language->delete();

        return redirect()->back();
    }

    public function status(Request $request)
    {
        $language = Language::find($request->language);
        if ($language->active == 1) {
            $language->active = 0;
        } else {
            $language->active = 1;
        }
        $language->save();

        return redirect()->back();
    }

    public function langUpdate(Request $request)
    {
        $language = Language::find($request->id);
        $language->abbr = $request->abbr;
        if($request->has('main') && $request->main=1){
            $current_main=Language::where('main',1)->first();
            $current_main->main = 0;
            $current_main->save();
            $language->main = 1;
        }
        $language->languages = $request->language;

        $language->save();
//
        return redirect()->back();

    }
}