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

Route::get('/', 'users\LoginSignupController@index');
Route::get('/login', 'users\LoginSignupController@index')->name('login');

Route::post('/validateLogin', 'users\LoginSignupController@validateLogin');
Route::post('/signup', 'users\LoginSignupController@signup');

Route::get('/logout', 'users\LoginSignupController@logout')->name('logout');

Route::get('/home', 'users\HomeController@index')->name('home')->middleware('auth');
Route::get('/profile-feed', 'users\ProfileController@index')->name('profile')->middleware('auth');



