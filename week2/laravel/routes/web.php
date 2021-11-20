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

Route::get('/blog', 'App\Http\Controllers\BlogController@showBlog')->name('blog');

Route::get("/post/{slug}", 'App\Http\Controllers\BlogController@showPost')->name('viewPosts');

Route::post('/insert/{slug}', 'App\Http\Controllers\BlogController@insertPost')->name('insert');
Route::post('/update', 'App\Http\Controllers\BlogController@updatePost')->name('update');
Route::post('/delete', 'App\Http\Controllers\BlogController@deletePost')->name('delete');