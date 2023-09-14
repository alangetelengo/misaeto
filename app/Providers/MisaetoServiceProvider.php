<?php

namespace App\Providers;

use App\Misaeto\Misaeto;
use Illuminate\Support\ServiceProvider;

class MisaetoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton("Misaeto", function(){

            return new Misaeto;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
