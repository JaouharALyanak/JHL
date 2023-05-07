<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        if (env('APP_ENV') !== 'local') {
            url()->forceScheme('https');
        }

        app()->bind('path.public', function() {
            $path = str_replace('JHL', '', base_path());
            return $path.'public_html';
        });
    }
}
