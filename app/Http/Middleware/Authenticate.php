<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {

//        return $request->expectsJson() ? null : route('login');

        if ($request->expectsJson()) {
            return null;
        }

        $main    = Language::where('main', 1)->pluck('abbr')->first();
        session(['locale' => $main]);

        return route('login');
    }
}
