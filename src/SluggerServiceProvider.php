<?php

namespace Echoamirali\Slugger;

use Illuminate\Support\ServiceProvider;

class SluggerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'slugger');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'slugger');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('slugger.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'slugger');

        // Register the main class to use with the facade
        $this->app->singleton('slugger', function () {
            return new Slugger;
        });
    }
}
