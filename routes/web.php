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

Auth::routes();

Route::get('/dashboard','HomeController@index')->name('dashboard');

Route::get('/dashboard','PingController@index')->name('dashboard');

Route::get('/dashboard/node','NodeController@index')->middleware('auth')->name('node.index');

