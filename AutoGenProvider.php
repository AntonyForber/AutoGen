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

        if (\File::exists(__DIR__.'/../vendor/autoload.php'))
        {
            include __DIR__.'/../vendor/autoload.php';
        }

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }
}