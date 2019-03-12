<?php

namespace AntonyForber\AutoGen;

use Illuminate\Support\ServiceProvider;

class AutoGenProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        // if (\File::exists(__DIR__.'/../vendor/autoload.php'))
        // {
        //     include __DIR__.'/../vendor/autoload.php';
        // }

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        
        $this->loadViewsFrom(__DIR__.'/resources/views', 'AutoGen');
        
        $this->publishes([
            __DIR__.'/resources/assets' => public_path('autogen'),
        ], 'autogen');
        
        // TODO
        // php artisan vendor:publish --tag=autogen --force
        
    }
}