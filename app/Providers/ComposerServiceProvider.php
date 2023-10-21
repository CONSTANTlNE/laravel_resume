<?php

namespace App\Providers;

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

            $localesPath = storage_path('app/public/locales.json');
            $localesJson = file_get_contents($localesPath); // Read the JSON file
            $locales     = json_decode($localesJson, true); // Decode JSON into an array
            $locale='en';
           if(session('locale') !== null){
               $locale=session('locale');
           }

            $view->with(compact('locales','locale' ));
        });
    }
}
