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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');

Route::get('/logout', 'Auth\LoginController@logout');
//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');
Route::post('/up-profile','UsersController@upProfile');

Route::get('/search','UsersController@search');
Route::post('/result','UsersController@result');

Route::get('/follow-list','followsController@followList');
Route::get('/follower-list','PostsController@index');

Route::get('/add-follow/{id}',[App\Http\Controllers\followsController::class, 'addFollow'])->name('add-follow');
Route::get('/rem-follow/{id}',[App\Http\Controllers\followsController::class, 'remFollow'])->name('rem-follow');

Route::post('/post/create','PostsController@create');

Route::get('post/{id}/update-form', 'PostsController@updateForm');
Route::post('post/update', 'PostsController@update');

Route::get('/other-profile/{id}', 'followsController@otherProfile');

Route::get('/post/{id}/delete','PostsController@delete');
Auth::routes();

