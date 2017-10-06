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

//静态首页、帮助页和关于页的路由
Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

//用户注册路由
Route::get('/signup', 'UserController@create')->name('signup');

//用户资源路由
Route::resource('/user', 'UserController');

//会话控制
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

//重置密码
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

//微博curd
Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);

//微博关注
Route::get('/user/{user}/followings', 'UserController@followings')->name('user.followings');
Route::get('/user/{user}/followers', 'UserController@followers')->name('user.followers');

//微博添加关注和取消关注
Route::post('/user/followers/{user}', 'FollowersController@store')->name('followers.store');
Route::delete('/user/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');

//抽奖
//Route::resource('/lottery', 'LotteryController');
Route::get('/lottery', 'LotteryController@index')->name('lottery.index');
Route::get('/lottery/get_win', 'LotteryController@start')->name('lottery.start');
