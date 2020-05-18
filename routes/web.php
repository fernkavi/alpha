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
    return view('home');
})->name('home');

// Route::get('/login', function () {
//     return view('');
// });

// Route::get('/ping','PingController@index');

Route::get('/test','test@index');

Route::get('/test2','test2@index');

Auth::routes();

// Route::get('/',)->name('home');

Route::get('/layouts/backend','SearchController@showAllNodes')->name('dropdownAllNodes');

Route::get('/dashboard','HomeController@index')->name('dashboard');

Route::get('/dashboard','PingController@index')->name('dashboard');

Route::get('/search','SearchController@index')->name('search');

Route::get('/save','StatusController@store')->name('savestatus');

Route::get('/search','SearchController@showAllNodes');

Route::get('/dashboard/node','NodeController@index')->middleware('auth')->name('node.index');

