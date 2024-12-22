<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
       

        // Register custom middleware
        Route::middlewareGroup('admin.only', [
            \App\Http\Middleware\AdminOnly::class,
        ]);
    }
}