<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Settings;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('*', function($view){
            $view->with('currentUser', \Auth::user());
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
