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
    return view('welcome');
});

Route::get('/experts', function () {
    return view('experts');
});

Route::get('/appointments/{id}', function () {
    return view('appointments');
});

Route::get('/info/{id}', function () {
    return view('info');
});

