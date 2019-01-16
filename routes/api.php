<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 *
 */
Route::group(['prefix' => 'auth', 'namespace' => 'API\v1\Auth'], function()
{
    Route::post('login', 'APIAuthController@postLogin')->name('api.auth.login');
});

Route::group(['namespace' => 'API\v1\Auth', 'middleware' => 'jwt.customauth'], function () 
{
	Route::get('logout', 'APIAuthController@logout')->name('api.auth.logout');
});


Route::group(['namespace' => 'API\v1', 'middleware' => 'jwt.customauth'], function () 
{
    include_route_files(__DIR__.'/Api/v1/');
});
