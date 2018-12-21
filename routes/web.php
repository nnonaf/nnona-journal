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

Route::resource('/journal', 'data\JournalController')->middleware('auth');
Route::resource('/settings', 'data\JournalTypeController')->middleware('auth');


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::post('/getJournalTransactions','HomeController@store')->name('home');



