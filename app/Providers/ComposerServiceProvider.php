<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer(['*'], function ($view) {

            $locales     = Language::where('active', 1)->pluck('abbr')->toArray();

            $view->with(compact('locales'));
        });
    }
}
