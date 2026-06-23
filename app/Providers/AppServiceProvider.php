<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator; // 1. WAJIB DI-IMPORT

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
    public function boot(UrlGenerator $url): void
    {
        // 2. Memaksa HTTPS hanya jika aplikasi berjalan di environment production
        if (config('app.env') === 'production' || env('APP_ENV') === 'production') {
            $url->forceScheme('https');
        }
    }
}