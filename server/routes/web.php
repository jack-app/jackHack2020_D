<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/save', 'SaveController@index')->name('save');
Route::get('/confirm', 'ConfirmController@index')->name('confirm');
Route::post('/confirm', 'ConfirmController@saveStoneData');
Route::get('/fight', 'FightController@index')->name('fight');
Route::get('/fight/{id}', 'FightController@stone')->name('fight');
Route::get('/result', 'ResultController@index')->name('result');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
