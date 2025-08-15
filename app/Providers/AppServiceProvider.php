<?php

namespace App\Providers;

use App\Models\Aplikasi;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\MobileViewComposer;

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
    public function boot(): void
    {
        Paginator::useBootstrap();
        $aplikasi = Aplikasi::first();
        View::share('aplikasi', $aplikasi);
        View::composer('layouts.mobile', MobileViewComposer::class);
    }
}
