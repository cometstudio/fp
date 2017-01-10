<?php

// Backend
@include('panelRoutes.php');

// Frontend
// Authenticated only
Route::group(['middleware' => ['redirectUnauthenticatedUser']], function () {
    Route::group(['as' => 'my:', 'prefix'=>'my'], function () {
        Route::get('/', 'MyController@index')->name('index');
        Route::post('/save', 'MyController@save')->name('save');
        Route::get('/delete', 'MyController@delete')->name('delete');
        Route::post('/picture/unlink', 'UsersController@unlinkPicture')->name('unlinkPicture');
    });

    Route::get('/logout', 'UsersController@logout')->name('logout');

    Route::get('/test', 'TestController@index');
});

// Unuthenticated only
Route::group(['middleware' => ['redirectAuthenticatedUser']], function () {
    Route::get('/forgot', 'UsersController@forgot')->name('forgot');
    Route::post('/forgot', 'UsersController@postForgot')->name('postForgot');

    Route::get('/login', 'UsersController@login')->name('login');
    Route::post('/login', 'UsersController@postLogin')->name('postLogin');
});

Route::get('/', 'IndexController@index')->name('index');
Route::get('/verify/{token}', 'UsersController@doVerify')->name('verify');

Route::group(['as' => 'calendar:', 'prefix'=>'calendar'], function () {
    Route::get('/', 'CalendarController@index')->name('index');
});

Route::group(['as' => 'videos:', 'prefix'=>'videos'], function () {
    Route::get('/', 'VideosController@index')->name('index');
    Route::get('/{id}', 'VideosController@item')->name('item')->where('id', '[0-9]+');
});

Route::group(['as' => 'gallery:', 'prefix'=>'gallery'], function () {
    Route::get('/', 'GalleryController@index')->name('index');
    Route::get('/{id}', 'GalleryController@item')->name('item')->where('id', '[0-9]+');
});

Route::group(['as' => 'supplements:', 'prefix'=>'directory'], function () {

    Route::get('/{subalias?}', 'MiscController@item')->name('directory');
    Route::get('/graph', 'SupplementsController@graph')->name('graph');

    Route::group(['prefix'=>'supplements'], function () {
        Route::get('/', 'SupplementsController@index')->name('index');
    });
});

Route::group(['as' => 'comments:', 'prefix'=>'comments'], function () {
    Route::post('/thread/{hash}', 'CommentsController@thread')->name('thread');
    Route::post('/submit/{hash}', 'CommentsController@submit')->name('submit');
});

// Internal services
Route::post('/captcha/touch', 'UsersController@touchCaptcha');

// External services interfaces
// Captcha
Route::get('/captcha/default', function(){
    return captcha();
});

// Sitemap xml
Route::get('/sitemap/get', 'SitemapController@get');

Route::get('/instagram/auth', 'InstagramController@auth');

Route::group(['as' => 'webhook:', 'prefix'=>'webhook'], function () {
    Route::post('/{type}', 'WebhookController@type')->name('type')->where('type', '[a-z_]+');
});

// Misc route
Route::group(['as' => 'misc:'], function () {
    //Route::get('/{alias}/{subalias?}', 'MiscController@item')->name('item');
});

