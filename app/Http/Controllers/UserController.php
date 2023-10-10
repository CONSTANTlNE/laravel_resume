<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $user = auth()->user();

        // Get Followings
        $followings = $user->followings()->with('followable')->get();
        $following  = [];
        foreach ($followings as $result) {
            $following[] = $result->followable_id;
        }
        $following_users = User::whereIn('id', $following)->get();

        // Get followers
        $followers = $user->followers()->with('followers')->get();
        $follower  = [];
        foreach ($followers as $result) {
            $follower[] = $result->followable_id;
        }
        $follower_users = User::whereIn('id', $follower)->get();


//        // Add a 'type' attribute to each result
//        $followings->each(function ($following) {
//            $following->type = 'following';
//        });
//
//        $followers->each(function ($follower) {
//            $follower->type = 'follower';
//        });
//        $Join = $followings->concat($followers);

        return view('admin.pages.profile', compact('user', 'following_users', 'follower_users'));
    }

}
