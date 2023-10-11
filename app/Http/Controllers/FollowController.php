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


}
