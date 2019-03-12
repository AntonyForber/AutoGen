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
        // Include the package classmap autoloader
        if (\File::exists(__DIR__.'/../vendor/autoload.php'))
        {
            include __DIR__.'/../vendor/autoload.php';
        }
        /**
        * Routes
        */
        $this->app->router->group(['namespace' => 'AntonyForber\AutoGen'],
            function(){
                require __DIR__.'/routes/web.php';
            }
        );


    }
}