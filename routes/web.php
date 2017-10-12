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

Route::any('/wechat', 'WeChatController@serve');

//静态首页、帮助页和关于页的路由
Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

//用户注册路由
Route::get('/signup', 'UserController@create')->name('signup');


Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('/wechat_users', function () {
        $wechat_user = session('wechat.oauth_user'); // 拿到授权用户资料
        return view('wechat_users.index', compact('wechat_user'));
    });
});

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
Route::get('/lottery/get_list','LotteryController@get_list')->name('lottery.get_list');
Route::get('/lottery/set_goods', 'LotteryController@show')->name('lottery.show');
Route::get('/lottery/edit_goods', 'LotteryController@edit')->name('lottery.edit');

Route::get('/lottery/change_goods/{good}', 'LotteryController@change')->name('lottery.change');
Route::patch('/lottery/update_goods/{good}', 'LotteryController@update')->name('lottery.update');
Route::delete('/lottery/set_goods/{good}', 'LotteryController@destroy')->name('lottery.destroy');
Route::post('/lottery/store_goods','LotteryController@store')->name('lottery.store');

//奖品相关
Route::get('/prizes/{user}', 'PrizeController@index')->name('prizes.index');
