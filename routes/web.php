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


// Authentication routes...
Route::get('admin/login', ['as' => 'admin.login', 'uses' => 'AdminLoginController@index']);
Route::post('admin/login', 'AdminLoginController@login');
Route::get('admin/logout', ['as' => 'logout', 'uses' => 'AdminLoginController@logout']);


Route::group(['middleware'=>'auth'],function(){
    Route::get('admin',['as' => 'admin.index', 'uses'=>'AdminController@index']);

    Route::get('admin/user',['as' => 'admin.user.index', 'uses'=>'AdminUserController@index']);
    Route::get('admin/user/edit/{id}',['as' => 'admin.user.edit', 'uses'=>'AdminUserController@edit']);
    Route::get('admin/user/destroy/{id}',['as' => 'admin.user.destroy', 'uses'=>'AdminUserController@destroy']);
    Route::get('admin/user/create',['as' => 'admin.user.create', 'uses'=>'AdminUserController@create']);
    Route::post('admin/user/save',['as' => 'admin.user.save', 'uses'=>'AdminUserController@save']);
    Route::post('user/update/{id}',['as' => 'admin.user.update', 'uses'=>'AdminUserController@update']);

    Route::get('admin/topic',['as' => 'admin.topic.index', 'uses'=>'AdminTopicController@index']);
    Route::get('admin/topic/edit/{id}',['as' => 'admin.topic.edit', 'uses'=>'AdminTopicController@edit']);
    Route::get('admin/topic/destroy/{id}',['as' => 'admin.topic.destroy', 'uses'=>'AdminTopicController@destroy']);
    Route::get('admin/topic/create',['as' => 'admin.topic.create', 'uses'=>'AdminTopicController@create']);
    Route::post('admin/topic/save',['as' => 'admin.topic.save', 'uses'=>'AdminTopicController@save']);
    Route::post('admin/topic/update/{id}',['as' => 'admin.topic.update', 'uses'=>'AdminTopicController@update']);
    Route::get('admin/topic/feature/{id}',['as' => 'admin.topic.feature', 'uses'=>'AdminTopicController@feature']);


    Route::get('admin/product',['as' => 'admin.product.index', 'uses'=>'AdminProductController@index']);
    Route::get('admin/product/edit/{id}',['as' => 'admin.product.edit', 'uses'=>'AdminProductController@edit']);
    Route::get('admin/product/destroy/{id}',['as' => 'admin.product.destroy', 'uses'=>'AdminProductController@destroy']);
    Route::get('admin/product/create',['as' => 'admin.product.create', 'uses'=>'AdminProductController@create']);
    Route::post('admin/product/save',['as' => 'admin.product.save', 'uses'=>'AdminProductController@save']);
    Route::post('admin/product/update/{id}',['as' => 'admin.product.update', 'uses'=>'AdminProductController@update']);

    Route::get('admin/feature/{topic}',['as' => 'admin.feature', 'uses'=>'AdminFeatureController@feature']);

});



Route::get('/datenschutz', function () {
    return view('datenschutz');
});


Route::get('/impressum', function () {
    return view('impressum');
});

Route::get('/{topic}', ['as' => 'affiliate.topic', 'uses' => 'AffiliateController@topic'])->where('topic','.+');
Route::get('/', ['as' => 'affiliate.index', 'uses' => 'AffiliateController@index']);
