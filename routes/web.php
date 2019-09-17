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

Route::get('/', 'WebController@index');

Route::get('/checkout', 'WebController@checkout')->middleware('auth')->name('checkout');

Route::get('/subscription', 'WebController@subscription')->middleware('auth')->name('subscription');

Route::post('/api/users/set_token', 'WebController@set_token')->middleware('auth');

Route::post('/api/users/subscription', 'WebController@set_subscription')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
