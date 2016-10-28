<?php

namespace App\Providers\Pmanager;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->app->singleton('pmanager', function ($app) {
            return new Pmanager();
        });
    }
}