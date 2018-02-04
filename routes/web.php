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

Route::get('/', 'GuestController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/newpost', 'PostController@newPost');

Route::get('/posteditor', 'PostController@postEditor');
Route::post('/updatepost', 'PostController@updatePost');
Route::post('/deletepost', 'PostController@deletePost');

Route::get('/settings', 'SettingController@viewSettings');
Route::post('/savesettings', 'SettingController@saveSettings');
Route::post('/deleteuser', 'SettingController@deleteUser');

Route::post('/searchpost', 'SearchController@searchPost');
