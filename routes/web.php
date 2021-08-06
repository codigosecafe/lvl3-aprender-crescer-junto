<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('post.index');
});
Route::get('/posts', 'PostsController@index')->name('post.index');

Route::get('/posts/panel', 'PostsController@indexPanel')->name('post.panel');

Route::get('/posts/create', 'PostsController@create')->name('post.create');

Route::post('/posts/create', 'PostsController@store')->name('post.store');

Route::get('/posts/edit/{type}/{id}', 'PostsController@edit')->name('post.edit');

Route::put('/posts/edit/{type}/{id}', 'PostsController@update')->name('post.update');

Route::delete('/posts/delete/{type}/{id}', 'PostsController@destroy')->name('post.delete');
