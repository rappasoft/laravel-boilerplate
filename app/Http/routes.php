<?php

Route::get('/', 'FrontendController@index');
Route::get('dashboard', 'DashboardController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);