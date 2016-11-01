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
Route::get('/', 'LoginController@index');

Route::group(['middleware'=>'admin'],function(){
	Route::get('admin','AdminController@index');
	Route::post('register','AdminController@register');
	Route::post('admin/remove-user/{id}','AdminController@removeUser');
	Route::get('admin/update-user/{id}','AdminController@updateUser');
	Route::post('admin/save-user/{id}','AdminController@saveUser');	
	Route::delete('admin/delete-user/{id}','AdminController@removeUser');	
});

Route::post('login','LoginController@login')->name('user.login');
Route::get('logout','LoginController@logout');

Route::get('module-sell', 'AppController@sell');
Route::get('store', 'AppController@admin');


Route::get('config', 'WasteController@index');
Route::post('waste','WasteController@addWaste')->name('waste.create');
Route::get('waste/{id}','WasteController@getWaste');
Route::post('edit_waste','WasteController@updateWaste')->name('waste.update');


Route::post('filter', 'ArticleController@search');

Route::resource('categories', 'CategoryController');
Route::get('categories-list', 'CategoryController@listing');
Route::resource('articles', 'ArticleController');
Route::post('search', 'ArticleController@search');
Route::get('account/{id}','UserController@edit');
Route::post('update-user/{id}','UserController@update')->name('user.update');





