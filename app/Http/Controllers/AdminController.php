<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
 public function articles(){

 }

}