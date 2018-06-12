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

Route::get('/', 'HomeController@index');
 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('bulletins','BulletinBoardController@index');
Route::get('bulletins/create','BulletinBoardController@create')->middleware('admin', 'superadmin');
Route::get('bulletins/{id}/{slug}', 'BulletinBoardController@show')->name('bulletin');
Route::post('bulletins', 'BulletinBoardController@store');


Route::post('bulletins/{bulletin_id}/post','PostController@store')->name('post');


Route::post('user/bulletin', 'UserBulletinController@store')->name('user/bulletin');

Route::get('admin', 'AdminController@index')->middleware('admin', 'superadmin');
Route::get('admin/bulletin/{id}', 'AdminController@bulletinShow')->name('admin/bulletin')->middleware('admin', 'superadmin');

Route::get('/profile', 'ProfileController@edit')->name('profile');
Route::post('/profile-update', 'ProfileController@update')->name('profile.update');