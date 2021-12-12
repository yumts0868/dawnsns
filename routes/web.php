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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
//login
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');
//新規登録
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');
//登録後画面
Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
//topページ
Route::get('/top', 'PostsController@index');
//プロフィール編集
Route::get('/profile', 'UsersController@profile');
//ユーザー検索フォーム
Route::get('/search', 'UsersController@search');
//フォローリスト
Route::get('/follow-list', 'PostsController@index');
Route::get('/follower-list', 'PostsController@index');

Route::post('/create', 'PostsController@create');

Route::post('/delete/{id}', 'PostsController@delete');
Route::post('/edit/{id}', 'PostsController@edit');


//ログアウト
Route::get('/logout', 'Auth\LoginController@logout');
