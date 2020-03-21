<?php

use Illuminate\Support\Str;

Route::get('/', 'Client\PageController@index');
Route::get('post/{id}', 'Client\PageController@postDetail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('admin', function () {
//     return view('admin.layouts.master');
// });

// Route::view('admin', 'admin.layouts.master');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
    Route::view('/', 'admin.layouts.master');
    Route::get('post', 'PostController@index');
    Route::post('post', 'PostController@store');
    Route::get('post/create', 'PostController@create');
    Route::get('post/{id}', 'PostController@show');
    Route::get('post/{id}/edit', 'PostController@edit');
    Route::post('post/{id}/edit', 'PostController@update');
    Route::get('post/{id}/delete', 'PostController@destroy');
});


Route::get('test', function() {
    // return asset('css/app.css');
    // return date('d-m-Y h:m:s', time());
    // return Str::random(40);
    return uniqid();
});