<?php

Route::get('payments/create', 'PaymentsController@create')->name('payments.create')->middleware('auth');
Route::post('payments', 'PaymentsController@store')->name('payments')->middleware('auth');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
