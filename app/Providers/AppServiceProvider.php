<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // Configurar para GitHub Codespaces
        if (request()->header('X-Forwarded-Proto') === 'https') {
            URL::forceScheme('https');
        }
        
        // Forzar la URL base desde el .env
        if ($appUrl = config('app.url')) {
            URL::forceRootUrl($appUrl);
        }
    }
}
