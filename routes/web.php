<?php

// API
@include('apiRoutes.php');

// Panel
@include('panelRoutes.php');

Route::get('/', 'IndexController@index');

Route::group(['as' => 'objects::', 'prefix'=>'objects'], function () {
    Route::get('/', 'ObjectsController@index')->name('index');
});