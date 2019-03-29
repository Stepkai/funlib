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
Route::get('/loginform', 'Web\UserController@login')->name('loginform');
Route::post('/signin', 'Web\UserController@signin')->name('signin');

Route::get('user', 'Admin\UserController@index')->name('index');
Route::get('user/create', 'Admin\UserController@create')->name('create');
Route::post('user/store', 'Admin\UserController@store')->name('save');
Route::get('user/edit/{id?}', 'Admin\UserController@edit')->name('edit');
Route::get('user/delete/{id}', 'Admin\UserController@destroy')->name('delete');

