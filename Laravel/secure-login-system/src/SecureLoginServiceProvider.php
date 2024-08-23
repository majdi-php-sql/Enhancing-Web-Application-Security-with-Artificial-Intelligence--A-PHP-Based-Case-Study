<?php

namespace Majdi\SecureLoginSystem;

use Illuminate\Support\ServiceProvider;

class SecureLoginServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        // Register configuration file
        $this->mergeConfigFrom(
            __DIR__.'/../config/secure-login.php', 'secure-login'
        );

        // Register AI threat detection service
        $this->app->singleton('AIThreatDetectionService', function ($app) {
            return new Services\AIThreatDetectionService();
        });

        // Register Security service
        $this->app->singleton('SecurityService', function ($app) {
            return new Services\SecurityService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'secure-login');

        // Publish configuration file
        $this->publishes([
            __DIR__.'/../config/secure-login.php' => config_path('secure-login.php'),
        ]);

        // Run migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
