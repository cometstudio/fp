<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Guard;
use App\Models\Settings;

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

        view()->share('settings', Settings::where('id', '=', 1)->first());
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
