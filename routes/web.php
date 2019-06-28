<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('blog/posts/{post}', 'BlogController@show')->name('blog.show');
Route::get('blog/category/{category}', 'BlogController@category')->name('blog.category');
Route::get('blog/tag/{tag}', 'BlogController@tag')->name('blog.tag');

Auth::routes();



Route::middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories', 'CategoriesController');
    Route::resource('tags', 'TagsController');
    Route::resource('posts', 'PostsController');
    Route::get('trashed-post', 'PostsController@trashed')->name('trashed-posts.index');
    Route::put('trashed-post/{post}','PostsController@restore')->name('trashed-post.restore');
});

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('users/profile', 'UserController@edit')->name('users.edit-profile');
    Route::put('users/profile', 'UserController@update')->name('users.update-profile');
    Route::get('users', 'UserController@index')->name('users.index');
    Route::post('users/{user}/make-admin', 'UserController@makeAdmin')->name('users.make-admin');
});