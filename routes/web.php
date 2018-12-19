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

use Illuminate\Auth\Middleware\Authenticate;
// Route::resource('/', 'Data\Journal')->middleware('auth');



Route::resource('/', 'Data\Journal');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
