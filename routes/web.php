<?php

/*
|--------------------------------------------------------------------------
| Web Routes     Route::get('/dashboard','Dashboard\DashboardController@index')->name('dashboard');

|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('admin')->group(function(){
    Route::group(['middleware'=>'checkLogout'],function(){
        Route::get('/login','Admin\LoginController@index')->name('login'); 
        Route::post('/loginsubmit','Admin\LoginController@loginsubmit')->name('loginsubmit');
    });

    Route::group(['middleware'=>'checkLogin'],function(){
        Route::get('/logout','Admin\LoginController@logout')->name('logout');
        Route::get('/home','Admin\LoginController@home')->name('home');
        Route::post('/custom/message','Admin\LoginController@message')->name('message');

        Route::group(['middleware'=>'checkAdmin'],function(){
            Route::prefix('user')->group(function(){
                Route::get('/', 'Admin\UserController@index')->name('userlist');
                Route::get('/create','Admin\UserController@create')->name('useradd');
                Route::post('/store','Admin\UserController@store')->name('userstore');
                Route::get('/edit/{id}','Admin\UserController@edit')->name('useredit');
                Route::post('/update','Admin\UserController@update')->name('userupdate');
            });
            Route::prefix('slide')->group(function(){
                Route::get('/', 'Admin\SettingController@slideList')->name('slidelist');
                Route::post('/duration','Admin\SettingController@slideDuration')->name('durationstore');

                Route::get('/flood/summary', 'Admin\SettingController@floodSummary')->name('floodsummary');
                Route::post('/flood/summary', 'Admin\SettingController@floodSummaryStore')->name('floodsummary.store');

                Route::get('/image/list', 'Admin\SettingController@slideImgList')->name('slide.image.list');
                Route::get('/image/create', 'Admin\SettingController@slideImgView')->name('slide.image.view');
                Route::post('/image/store', 'Admin\SettingController@slideImgStore')->name('slide.image.store');
                Route::get('/image/remove/{id}', 'Admin\SettingController@slideImgRemove')->name('slide.image.remove');
            });
        });
    });
});

Route::group(['middleware'=>'checkAccessToken'],function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/map', 'DashboardController@map')->name('map');
});




