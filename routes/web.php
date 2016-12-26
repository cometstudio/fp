<?php

// Backend
@include('panelRoutes.php');

// Frontend
Route::get('/test', 'TestController@index');

Route::get('/instagram/auth', 'InstagramController@auth');

Route::get('/login', 'UsersController@login')->name('login');
Route::post('/login', 'UsersController@postLogin')->name('postLogin');
Route::get('/logout', 'UsersController@logout')->name('logout');

Route::get('/', 'IndexController@index');

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

Route::group(['as' => 'comments:', 'prefix'=>'comments'], function () {
    Route::post('/thread/{hash}', 'CommentsController@thread')->name('thread');
    Route::post('/submit/{hash}', 'CommentsController@submit')->name('submit');
});

Route::group(['as' => 'webhook:', 'prefix'=>'webhook'], function () {
    Route::post('/{type}', 'WebhookController@type')->name('type')->where('type', '[a-z_]+');
});

//Route::get('/{id}', 'UsersController@login');

//Route::group(['as' => 'misc:'], function () {
//    Route::get('/{alias}/{subalias?}', 'MiscController@item')
//        ->name('item');
//});