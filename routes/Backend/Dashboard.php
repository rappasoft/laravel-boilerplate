<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::name('dashboard')->get('dashboard', 'DashboardController@index');
