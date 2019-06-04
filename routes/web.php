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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// module company -> barbacoas
Route::resource('companies','CompanyController');

Route::get('/booking', 'CompanyController@bookingBBQ')->name('booking');
Route::post('/bookingStore', 'CompanyController@bookingStore')->name('bookingStore');
