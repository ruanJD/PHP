<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//Route::group(['middleware' => 'web'], function () {
    Route::get('/','Home\IndexController@index');
    Route::get('cate/{cate_id}','Home\IndexController@cate');
    Route::get('art/{art_id}','Home\IndexController@article');

    Route::any('admin/login','Admin\LoginController@login');
    Route::get('admin/code','Admin\LoginController@code');
   // Route::any('admin/index', 'Admin\IndexController@index');
  //  Route::any('admin/info', 'Admin\IndexController@info');

//});


//Route::group(['middleware'=>'web','admin.login','prefix'=>'admin','namespace'=>'Admin'],function(){
Route::group(['middleware'=>'admin.login','prefix'=>'admin','namespace'=>'Admin'],function(){

    Route::get('/', 'IndexController@index');

    Route::get('info', 'IndexController@info');

    Route::get('quit', 'LoginController@quit');

    Route::any('pass', 'IndexController@pass');

    Route::post('cate/changeOrder', 'CategoryController@changeOrder');
    Route::resource('category','CategoryController');

    Route::resource('article','ArticleController');

    Route::resource('links','LinksController');
    Route::post('links/changeOrder','LinksController@changeOrder');


    Route::resource('navs','NavsController');
    Route::post('navs/changeOrder','NavsController@changeOrder');


    Route::get('config/putfile','ConfigController@putFile');
    Route::resource('config','ConfigController');
    Route::post('config/changeContent','ConfigController@changeContent');
    Route::post('config/changeOrder','ConfigController@changeOrder');

    Route::any('upload','CommonController@upload');
});

