<?php

Route::get('/', 'FrontendController@index');
Route::get('dashboard', 'DashboardController@index');

//Socialite Integration
Route::get('auth/login/{provider}', ['as' => 'auth.provider', 'uses' => 'Auth\AuthController@loginThirdParty']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);