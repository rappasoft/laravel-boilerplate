<?php

use App\Http\Controllers\LocaleController;

/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/frontend/');
});

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__.'/backend/');
});

//checking database connection coz I am working on mac laptop with no mysql
Route::get('checkDatabase',function(){
    try {
        $dbconnect = DB::connection()->getPDO();
        $dbname = DB::connection()->getDatabaseName();
        echo "Connected successfully to the database. Database name is :".$dbname;
    } catch(Exception $e) {
        echo "Error in connecting to the database";
    }
});
