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

Route::get('/auth/{provider}','Auth\SocialController@redirectToProvider');
Route::get('/auth/{provider}/callback','Auth\SocialController@handleCallback');

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::get('logout','Auth\LoginController@logout');