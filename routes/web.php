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
   // App\Jobs\UrlZadacha::dispatch("TEST");//->delay(now()->addSeconds(10));
	return view('welcome');
});

Route::prefix('admin')->group(function () {

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/', 'Admin\UserController@index')->name('index')->middleware('auth');;
	Route::get('/create', 'Admin\UserController@create')->name('create')->middleware('auth');;
	Route::post('/store', 'Admin\UserController@store')->name('save')->middleware('auth');;
	Route::get('/edit/{id?}', 'Admin\UserController@edit')->name('edit')->middleware('auth');;
	Route::get('/delete/{id}', 'Admin\UserController@destroy')->name('delete')->middleware('auth');;
	Route::get('/loginform', 'Admin\AuthController@showLoginForm')->name('loginform');
    Route::post('/signin', 'Admin\AuthController@login')->name('signin');
    Route::post('/logout', 'Admin\AuthController@logout')->name('logout');

});

//    Route::get('page/create', 'Client\PagesController@create')->name('createUrl');
    Route::post('page/store', 'Client\PagesController@store')->name('storeUrl');
//    Route::get('page/{id?}', 'Client\PagesController@take')->name('pageId');
//    Route::get('page/send/{id?}', 'Client\PagesController@send')->name('sendId');
