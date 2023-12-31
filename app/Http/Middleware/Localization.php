<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $main    = Language::where('main', 1)->pluck('abbr')->first();
        $locales = Language::where('active', 1)->pluck('abbr')->toArray();
//        dd($main);
//         dd($locales);
        //dd($request->segment(1));
//        dd(session('locale'));

        if (in_array(session('locale'), $locales) && !in_array($request->segment(1), $locales)) {
            Session::regenerate();
            app()->setLocale($main);
            session(['locale' => $main]);
            URL::defaults(['locale' => session('locale')]);
        } elseif (session()->has('locale')) {
            app()->setLocale(session('locale'));
            URL::defaults(['locale' => session('locale')]);
        } elseif (in_array($request->segment(1), $locales)) {
            app()->setLocale($request->segment(1));
            session(['locale' => $request->segment(1)]);
            URL::defaults(['locale' => $request->segment(1)]);
        } elseif (!session()->has('locale') && !in_array($request->segment(1), $locales)) {
//           dd(session('locale'));
            app()->setLocale($main);
            session(['locale' => $main]);
            URL::defaults(['locale' => $main]);
        }

        return $next($request);
    }
}
