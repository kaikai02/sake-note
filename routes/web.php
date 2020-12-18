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

Route::get('/', 'PostController@index')->name('top');
Route::get('/posts/create', 'PostController@showCreateForm')->name('posts.create');
Route::post('/posts/create', 'PostController@create');
Route::get('/posts/{id}/edit', 'PostController@showEditForm')->name('posts.edit');
Route::post('/posts/{id}/edit', 'PostController@edit');
Route::post('/post/{id}/destroy', 'PostController@destroy')->name('posts.destroy');
