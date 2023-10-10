<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Overtrue\LaravelLike\Like;

class LikeController extends Controller
{
    public function like(Request $request){

        $user=auth()->user();
        $article=Article::find($request->id);
        $user->toggleLike($article);


        return redirect()->back();
    }

    public function show(){
     $user=auth()->user()->id;
      $likes=Like::where('user_id',$user->id)->pluck('user_id');
      $articles=Article::where('id',$likes)->get();
      return view();
    }
}
