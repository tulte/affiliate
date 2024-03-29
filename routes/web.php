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

    Route::get('admin/site',['as' => 'admin.site.index', 'uses'=>'AdminSiteController@index']);
    Route::get('admin/site/edit/{id}',['as' => 'admin.site.edit', 'uses'=>'AdminSiteController@edit']);
    Route::get('admin/site/destroy/{id}',['as' => 'admin.site.destroy', 'uses'=>'AdminSiteController@destroy']);
    Route::get('admin/site/create',['as' => 'admin.site.create', 'uses'=>'AdminSiteController@create']);
    Route::post('admin/site/save',['as' => 'admin.site.save', 'uses'=>'AdminSiteController@save']);
    Route::post('admin/site/update/{id}',['as' => 'admin.site.update', 'uses'=>'AdminSiteController@update']);

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


    Route::get('admin/group',['as' => 'admin.group.index', 'uses'=>'AdminGroupController@index']);
    Route::get('admin/group/edit/{id}',['as' => 'admin.group.edit', 'uses'=>'AdminGroupController@edit']);
    Route::get('admin/group/destroy/{id}',['as' => 'admin.group.destroy', 'uses'=>'AdminGroupController@destroy']);
    Route::get('admin/group/create',['as' => 'admin.group.create', 'uses'=>'AdminGroupController@create']);
    Route::post('admin/group/save',['as' => 'admin.group.save', 'uses'=>'AdminGroupController@save']);
    Route::post('admin/group/update/{id}',['as' => 'admin.group.update', 'uses'=>'AdminGroupController@update']);


    Route::get('admin/article',['as' => 'admin.article.index', 'uses'=>'AdminArticleController@index']);
    Route::get('admin/article/edit/{id}',['as' => 'admin.article.edit', 'uses'=>'AdminArticleController@edit']);
    Route::get('admin/article/destroy/{id}',['as' => 'admin.article.destroy', 'uses'=>'AdminArticleController@destroy']);
    Route::get('admin/article/create',['as' => 'admin.article.create', 'uses'=>'AdminArticleController@create']);
    Route::post('admin/article/save',['as' => 'admin.article.save', 'uses'=>'AdminArticleController@save']);
    Route::post('admin/article/update/{id}',['as' => 'admin.article.update', 'uses'=>'AdminArticleController@update']);


    Route::get('admin/info',['as' => 'admin.info.index', 'uses'=>'AdminInfoController@index']);
    Route::get('admin/info/edit/{id}',['as' => 'admin.info.edit', 'uses'=>'AdminInfoController@edit']);
    Route::get('admin/info/destroy/{id}',['as' => 'admin.info.destroy', 'uses'=>'AdminInfoController@destroy']);
    Route::get('admin/info/create',['as' => 'admin.info.create', 'uses'=>'AdminInfoController@create']);
    Route::post('admin/info/save',['as' => 'admin.info.save', 'uses'=>'AdminInfoController@save']);
    Route::post('admin/info/update/{id}',['as' => 'admin.info.update', 'uses'=>'AdminInfoController@update']);


});


Route::group(['middleware'=>'affiliate'],function(){
    Route::get('/datenschutz', ['as' => 'affiliate.datenschutz', 'uses'=>'AffiliateController@datenschutz']);
    Route::get('/impressum', ['as' => 'affiliate.impressum', 'uses'=>'AffiliateController@impressum']);

    Route::get('/{topic}/vergleich', ['as' => 'affiliate.topic.compare', 'uses' => 'AffiliateController@topic'])->where('topic','.+');
    Route::get('/{topic}/artikel', ['as' => 'affiliate.topic.article', 'uses' => 'AffiliateController@article'])->where('topic','.+');
    Route::get('/{topic}', ['as' => 'affiliate.topic', 'uses' => 'AffiliateController@topic'])->where('topic','.+');

    Route::get('/', ['as' => 'affiliate.index', 'uses' => 'AffiliateController@index']);
});
