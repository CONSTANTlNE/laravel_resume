<?php

use App\Models\User;

function user($user_id){
    $user=User::find($user_id);
return $user;

}

function toLatin($georgianText) {

    $converstion = Transliterator::create('Any-Latin; NFD; [:Nonspacing Mark:] Remove; NFC; [:Punctuation:] Remove; Lower()');
    return $converstion->transliterate($georgianText);
}