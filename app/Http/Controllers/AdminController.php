<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index(){

        return view('admin.index');
    }
    public function users(){

        $users=User::with('roles','articles')->withCount('articles')->get();
        return view('admin.pages.users',compact('users'));

}
    public function articles()
    {
        $categories= Category::withCount('articles')->get();
        $articles = Article::with('media', 'categories', 'users')
            ->orderBy('created_at', 'desc')->get();


        return view('admin.blog.view_articles', compact('articles', 'categories'));
    }

}