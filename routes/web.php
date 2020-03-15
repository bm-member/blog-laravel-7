<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', function () {
    return view('admin.layouts.master');
});

Route::get('admin/post', 'Admin\PostController@index');
Route::post('admin/post', 'Admin\PostController@store');
Route::get('admin/post/create', 'Admin\PostController@create');
Route::get('admin/post/{id}', 'Admin\PostController@show');
Route::get('admin/post/{id}/edit', 'Admin\PostController@edit');
Route::post('admin/post/{id}/edit', 'Admin\PostController@update');
Route::get('admin/post/{id}/delete', 'Admin\PostController@destroy');
