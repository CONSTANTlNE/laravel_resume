<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
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

//        dd(session('locale'));

        $localesPath = storage_path('app/public/locales.json');
        $localesJson = file_get_contents($localesPath);
        $locales     = json_decode($localesJson, true);
        $keys = array_keys($locales);


        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        } elseif (in_array($request->segment(1),$keys)) {
            app()->setLocale($request->segment(1));
            session(['locale' => $request->segment(1)]);
        }
        else{
            app()->setLocale('en');
        }





//        if (! in_array($request->segment(1),$locales)) {
//            app()->setLocale(config('app.locale'));
//        } elseif (!session()->has('locale')){
//            app()->setLocale($request->segment(1));
//            session(['locale' => $request->segment(1)]);
//        }
//        else{
//            app()->setLocale(session('locale'));
//        }




        return $next($request);
    }
}
