<?php

Route::group([
    'prefix'     => 'history',
    'as'         => 'history.',
    'namespace'  => 'History',
    'middleware' => 'role:'.config('access.users.admin_role'),
], function () {
    Route::get('/', 'HistoryController@index')->name('index');
});
