<?php


Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function () {

    Route::get('login/{provider}/callback', 'SocialLoginController@login');

});
