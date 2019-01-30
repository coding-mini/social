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

Route::get('/github/login','SocialController@githubLogin');
Route::get('/github/callback','SocialController@githubCallback');

Route::get('/qq/login','SocialController@qqLogin');
Route::get('/qq/callback','SocialController@qqCallback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
