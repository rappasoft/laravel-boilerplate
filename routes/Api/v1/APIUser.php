<?php

/**
 *
 */
Route::group([], function()
{
    Route::get('user/my-profile', 'APIUserController@getMyProfile')->name('api.users.my-profile');
    Route::post('user/create', 'APIUserController@create')->name('api.users.create');
    Route::post('user/{id}/update', 'APIUserController@update')->name('api.users.update');
    Route::post('user/{id}/delete', 'APIUserController@destroy')->name('api.users.destroy');
});
?>