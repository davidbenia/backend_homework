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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('homepage');
});

Route::get('/about-me', function () {
    return view('about-me');
});

Route::get('/experience', function () {
    return view('experience');
});

Route::get('/example-page-1', function () {
    return view('example-page-1');
});

Route::get('/example-page-2', function () {
    return view('example-page-2');
});