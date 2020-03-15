<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', function () {
    return view('admin.layouts.master');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
    Route::get('post', 'PostController@index');
    Route::post('post', 'PostController@store');
    Route::get('post/create', 'PostController@create');
    Route::get('post/{id}', 'PostController@show');
    Route::get('post/{id}/edit', 'PostController@edit');
    Route::post('post/{id}/edit', 'PostController@update');
    Route::get('post/{id}/delete', 'PostController@destroy');
});


