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

Route::get('/board', 'BoardController@index')->name('board');
Route::get('/board/list', 'BoardController@list')->name('list');
Route::get('/board/write', 'BoardController@write')->name('write');
Route::post('/board/save', 'BoardController@taskSave')->name('save');
Route::get('/board/edit/{id}', 'BoardController@edit')->name('edit');
Route::post('/board/update/{id}', 'BoardController@update')->name('update');
Route::get('/board/delete/{id}', 'BoardController@delete')->name('delete');