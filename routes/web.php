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

Auth::routes();

Route::get('/home', 'InstansiController@index')->name('home');
Route::post('edit', 'InstansiController@edit')->name('edit');
Route::post('simpan', 'InstansiController@store')->name('store');
Route::get('/delete/{id}', 'InstansiController@delete')->name('delete');
