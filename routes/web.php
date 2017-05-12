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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/datenschutz', function () {
    return view('datenschutz');
});

Route::get('/haftungsausschluss', function () {
    return view('haftungsausschluss');
});

Route::get('/impressum', function () {
    return view('impressum');
});
