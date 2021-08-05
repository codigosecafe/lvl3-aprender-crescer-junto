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

Route::get('/posts/create', 'PostsController@create')->name('post.create');

Route::post('/posts/create', 'PostsController@store')->name('post.store');

Route::get('/posts/edit/{id}', 'PostsController@edit')->name('post.edit');

Route::put('/posts/edit/{id}', 'PostsController@update')->name('post.update');

Route::delete('/posts/delete/{id}', 'PostsController@destroy')->name('post.delete');
