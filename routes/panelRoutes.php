<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['as' => 'admin::', 'prefix' => 'admin', 'namespace'=>'Panel'], function () {

    Route::get('/logout', 'UserController@logout')->name('logout');

    Route::group(['middleware' => ['redirectAuthenticatedPanelUser']], function () {
        Route::get('/login', function(){
            return view('panel.user.login');
        })->name('login');

        Route::post('/login', 'UserController@postLogin')->name('postLogin');
    });

    Route::group(['middleware' => ['redirectUnauthenticatedPanelUser']], function () {
        Route::get('/', 'IndexController@index');

        Route::get('/{action}/{modelName}/{id?}', 'ActionsController@act')
            ->where('action', 'show|sort|create|edit')
            ->where('modelName', '[a-z0-9_]+')
            ->where('id', '[0-9]+')
            ->name('act');

        Route::post('/{action}/{modelName}/{id?}', 'ActionsController@act')
            ->where('action', 'gallerysort|imageadd|imagedrop|save|drop|courseproductadd|courseproductdel')
            ->where('modelName', '[a-z0-9_]+')
            ->where('id', '[0-9]+');

        // App specific routes
        // Manage
        Route::group(['as' => 'manage::', 'prefix'=>'manage'], function () {
            Route::get('/', 'ManageController@index')->name('manage');
            // Get different info (categories, regions, etc)
            Route::post('/get/{type}', 'ManageController@get')
                ->name('get');
            //Tasks
            Route::group(['as' => 'task::', 'prefix'=>'task'], function () {
                // Manage
                Route::post('/{id}/{action}', 'AvitoPagesTaskController@manage')
                    ->where('id', '[0-9]+')
                    ->name('byId');
                // Check status
                Route::post('/check/{id}', 'TaskController@check')
                    ->where('id', '[0-9]+')
                    ->name('checkByid');
            });

        });

        // Export lists to a .csv file
        Route::post('/excel/export/{modelName}/{format}', 'ExcelController@export')->name('exportAsExcel');

        Route::get('/proxy', 'ProxyController@stat');

        Route::get('/test', 'TestController@index');
    });
});