<?php

namespace App\Providers\Avito;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->app->singleton('avito', function ($app) {
            return new Avito();
        });
    }
}