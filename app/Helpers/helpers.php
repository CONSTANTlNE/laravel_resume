<?php

use App\Models\User;

function user($user_id){
    $user=User::find($user_id);
return $user;
}