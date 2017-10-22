<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::redirect('/', '/admin/dashboard', 302);
Route::get('dashboard', 'DashboardController@index')->name('dashboard');