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

Route::get('test','admin\TheLoaiController@test');

Route::get('admin/login','admin\LoginController@getLogin')->name('admin.login');
Route::post('admin/login','admin\LoginController@postLogin');
Route::get('admin/logout','admin\LoginController@logout')->name('admin.logout');


Route::group(['prefix'=>'admin','namespace'=>'admin','middleware'=>'auth'],function(){
	Route::resource('/','DashboardController')->only(['index']);
	Route::resource('user','UserController');
	Route::resource('theloai','TheLoaiController');
	Route::get('tintuc/search','TinTucController@search')->name('tintuc.search');
	Route::resource('tintuc','TinTucController');
	Route::resource('comment','CommentController')->only(['destroy']);
	Route::get('getLoaiTinAjax/{id}','TheLoaiController@getLoaiTinAjax');
	

});




