<?php

/**
 * Frontend Controllers
 */
$router->get('/', 'FrontendController@index')->name('home');
$router->get('macros', 'FrontendController@macros');

/**
 * These frontend controllers require the user to be logged in
 */
$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('dashboard', 'DashboardController@index')->name('frontend.dashboard');
    $router->get('profile/edit', 'ProfileController@edit')->name('frontend.profile.edit');
    $router->patch('profile/update', 'ProfileController@update')->name('frontend.profile.update');
});