<?php

// API
@include('apiRoutes.php');

// Panel
@include('panelRoutes.php');

Route::get('/', 'IndexController@index');

Route::group(['as' => 'videos:', 'prefix'=>'videos'], function () {
    Route::get('/', 'VideosController@index')->name('index');
    Route::get('/{id}', 'VideosController@item')->name('item')->where('id', '[0-9]+');
});

Route::group(['as' => 'objects::', 'prefix'=>'objects'], function () {
    Route::get('/', 'ObjectsController@index')->name('index');
});