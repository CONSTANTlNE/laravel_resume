<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function setLocale(Request $request)
    {
        $lang = $request->input('locale');
//        dd($lang);
        app()->setlocale($lang);
//        Session::regenerate();
        session(['locale' => $lang]);
//        dd( app()->getlocale());
        return redirect()->back();
    }
}
