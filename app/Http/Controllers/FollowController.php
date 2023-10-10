<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function follow(Request $request)
    {

        $user1 = auth()->user();
        $user2 = User::find($request->id);
        $user1->toggleFollow($user2);

        return redirect()->back();
    }

    public function show()
    {
        $user       = auth()->user();
        $followings = $user->followings()->with('followable')->get();
        $following  = [];
        foreach ($followings as $result) {
            $following[] = $result->followable_id;
        }
          $following_users=User::whereIn('id',$following)->get();


        $followers = $user->followers()->with('followers')->get();
        $follower=[];
        foreach ($followers as $result) {
            $follower[] = $result->followable_id;
        }
        $follower_users=User::whereIn('id',$follower)->get();



        dd($followings);

    }
}
