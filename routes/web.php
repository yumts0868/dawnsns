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
Route::post('/profile/update', 'UsersController@update');
//ユーザー検索フォーム
Route::get('/search', 'UsersController@search');
Route::post('/result', 'UsersController@result');
//フォローリスト,フォロワーリスト,プロフィール画面
Route::get('/follow-list', 'FollowsController@followList');
Route::get('/follower-list', 'FollowsController@followerList');
Route::get('/fp/{id}', 'FollowsController@fp');
//フォローするはずす
Route::post('/follow', 'FollowsController@follow');
Route::post('/unfollow', 'FollowsController@unfollow');
//投稿編集
Route::post('/create', 'PostsController@create');
Route::post('/edit', 'PostsController@edit');
Route::get('/delete/{id}', 'PostsController@delete');

//ログアウト
Route::get('/logout', 'Auth\LoginController@logout');
