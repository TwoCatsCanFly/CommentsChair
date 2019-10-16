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


Auth::routes();

Route::get('/c/create', 'CommentsController@create')->name('comment.create');
Route::post('/c', 'CommentsController@store');

Route::get('/', 'CommentsController@index')->name('comment.index');;
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
Route::get('/profile/{user}/{comment}/edit', 'CommentsController@edit')->name('comment.edit');
Route::patch('/profile/{user}/{comment}', 'CommentsController@update')->name('comment.update');
Route::delete('/profile/{user}/{comment}', 'CommentsController@destroy')->name('comment.destroy');