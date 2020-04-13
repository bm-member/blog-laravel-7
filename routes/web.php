<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'Client\PageController@index');
Route::get('post/{id}', 'Client\PageController@postDetail');
Route::get('category/{id}', 'Client\PageController@postByCategory');

Auth::routes();
// Route::get('logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('admin', function () {
//     return view('admin.layouts.master');
// });

// Route::view('admin', 'admin.layouts.master');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['auth']
], function () {
    Route::view('/', 'admin.layouts.master');
    // Route::group(['middleware' => ['can:isAdminOrAuthor']], function() {
    // Post Routes
    Route::get('post', 'PostController@index');
    Route::post('post', 'PostController@store');
    Route::get('post/create', 'PostController@create');
    Route::get('post/{post}', 'PostController@show');
    Route::get('post/{id}/edit', 'PostController@edit');
    Route::post('post/{id}/edit', 'PostController@update');
    Route::get('post/{id}/delete', 'PostController@destroy');
    // Category Routes
    Route::get('/category', 'CategoryController@index');
    Route::get('/category/create', 'CategoryController@create');
    Route::post('/category', 'CategoryController@store');
    Route::post('/category/{id}', 'CategoryController@show');
    Route::get('/category/{id}/edit', 'CategoryController@edit');
    Route::post('/category/{id}/edit', 'CategoryController@update');
    Route::get('/category/{id}/delete', 'CategoryController@destroy');
    // });
    // User Routes
    Route::resource('/user', 'UserController');
});


Route::get('test', function () {
    Log::channel('slack')->info('Something happened!');
});
