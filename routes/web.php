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

// Bulletin Routes
Route::get('bulletins','BulletinBoardController@index');
Route::get('bulletins/{id}/{slug}', 'BulletinBoardController@show')->name('bulletin');
Route::get('bulletins/edit/{id}/{slug}', 'BulletinBoardController@edit')->name('bulletin/edit');
Route::patch('bulletins/edit/{id}/{slug}', 'BulletinBoardController@update')->name('bulletin/edit');
Route::post('bulletins', 'BulletinBoardController@store');
Route::get('bulletins/create','BulletinBoardController@create')->middleware('admin');
Route::post('bulletins/{bulletin_id}/post','PostController@store')->name('post/add');

//Admin Routes
Route::get('admin', 'AdminController@index');
Route::get('admin/bulletin/{id}', 'AdminController@bulletinShow')->name('admin/bulletin');
Route::delete('admin/bulletin/{id}', 'AdminController@deleteBulletin')->name('admin/bulletin');

Route::delete('admin/user/{id}', 'AdminController@deleteUser')->name('admin/user');





// Add User to Bulletin Board Route
Route::post('user/bulletin', 'UserBulletinController@store')->name('user/bulletin');

// Delete User Message/Post
Route::delete('bulletins/post/{id}','PostController@destroy')->name('post');

// User Profiles Routes
Route::get('/profile', 'ProfileController@edit')->name('profile');
Route::post('/profile-update', 'ProfileController@update')->name('profile.update');