<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Guard;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Guard $auth)
    {
        view()->composer('master', function($view) use ($auth){
            $view->with('currentUser', $auth->user());
        });

        view()->share('imagesPath', '/'.config('resizer.dir', ''));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
