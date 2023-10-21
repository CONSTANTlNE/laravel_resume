<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function setLocale(Request $request)
    {
        $lang = $request->input('locale');
        session(['locale' => $lang]);

        return redirect()->route('home', ['locale' => $lang]);
    }
}
