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



Route::post('/get/tags','TagController@index')->name('tag');
Route::post('/post/tags','TagController@index')->name('tag');
Route::post('/post/tags','TagController@index')->name('tag');

Route::get('/auth','TrainingController@index')->name('training');



