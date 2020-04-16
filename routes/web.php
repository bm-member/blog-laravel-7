<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

Route::get('/', 'Client\PageController@index');
Route::get('post/{post}', 'Client\PageController@postDetail');

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
    Route::get('/category/{id}', 'CategoryController@show');
    Route::get('/category/{id}/edit', 'CategoryController@edit');
    Route::post('/category/{id}/edit', 'CategoryController@update');
    Route::get('/category/{id}/delete', 'CategoryController@destroy');
    // });
    // User Routes
    Route::resource('/user', 'UserController');
    // Role Routes
    Route::resource('role', 'RoleController');
    // Profile Routes
    Route::view('profile', 'admin.profile.index')->name('profile.index');;
    Route::view('profile/edit', 'admin.profile.edit')->name('profile.edit');
    Route::put('profile/edit', 'ProfileController@update')->name('profile.update');
    Route::view('profile/password', 'admin.profile.edit_password')->name('profile.edit.password');
    Route::post('profile/password', 'ProfileController@updatePassword')->name('profile.update.password');
    
});

