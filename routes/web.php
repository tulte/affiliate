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

    Route::get('user',['as' => 'admin.user.index', 'uses'=>'AdminUserController@index']);
    Route::get('user/edit/{id}',['as' => 'admin.user.edit', 'uses'=>'AdminUserController@edit']);
    Route::get('user/destroy/{id}',['as' => 'admin.user.destroy', 'uses'=>'AdminUserController@destroy']);
    Route::get('user/create',['as' => 'admin.user.create', 'uses'=>'AdminUserController@create']);
    Route::post('user/save',['as' => 'admin.user.save', 'uses'=>'AdminUserController@save']);
    Route::post('user/update/{id}',['as' => 'admin.user.update', 'uses'=>'AdminUserController@update']);
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
