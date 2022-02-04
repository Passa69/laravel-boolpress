<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'GuestController@home') -> name('home');

Route::get('/post/index/{id}', 'GuestController@index') -> name('index');

Route::get('/post/create', 'GuestController@create') -> name('create');
Route::post('/post/store', 'GuestController@store') -> name('store');

Route::get('/post/delete/{id}', 'GuestController@delete') -> name('delete');