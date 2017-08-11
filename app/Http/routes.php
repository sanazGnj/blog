<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'ImageController@show');

Route::get('/add', 'ImageController@add')->name('upload.file');
Route::post('/add' ,'ImageController@save');


Route::get('/edit/{id}','ImageController@edit');

Route::post('/update/{id}','ImageController@update');


Route::get('/delete/{id}','ImageController@delete');



Route::auth();

Route::get('/home', 'HomeController@index');
