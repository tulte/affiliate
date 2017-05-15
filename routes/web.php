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

// Authentication routes...
Route::get('admin/login', ['as' => 'admin.login', 'uses' => 'AdminLoginController@index']);
Route::post('admin/login', 'AdminLoginController@login');
Route::get('admin/logout', ['as' => 'logout', 'uses' => 'AdminLoginController@logout']);


Route::group(['middleware'=>'auth'],function(){
    Route::get('admin',['as' => 'admin.index', 'uses'=>'AdminController@index']);
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
