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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/songs', 'SongController@list');
Route::post('/song', 'SongController@store');
Route::get('/song/{id}', 'SongController@show');
Route::delete('/song/{id}', 'SongController@destroy');
Route::put('/song/{id}', 'SongController@update');