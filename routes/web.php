<?php


Route::get('/', 'Tescontroller@welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
