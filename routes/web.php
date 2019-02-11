<?php

Route::get('/', 'QuoteController@create');
Route::post('/', 'QuoteController@store');

// Route::get('/resultado', function ($) {
// 	return view('resultado');
// });