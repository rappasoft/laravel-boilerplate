<?php

/**
 * Switch between the included languages
 */
Route::group(['namespace' => 'Language'], function () {
    require (__DIR__ . '/Routes/Language/Language.php');
});

Route::group(['middleware' => 'web'], function() {
    /**
     * Frontend Routes
     * Namespaces indicate folder structure
     */
    Route::group(['namespace' => 'Frontend'], function () {
        require (__DIR__ . '/Routes/Frontend/Frontend.php');
        require (__DIR__ . '/Routes/Frontend/Access.php');
    });

    /**
     * Backend Routes
     * Namespaces indicate folder structure
     */
    Route::group(['namespace' => 'Backend'], function () {
        Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

            /**
             * These routes need view-backend permission
             * (good if you want to allow more than one group in the backend,
             * then limit the backend features by different roles or permissions)
             *
             * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
             */
            Route::group(['middleware' => 'access.routeNeedsPermission:view-backend'], function () {
                require (__DIR__ . '/Routes/Backend/Dashboard.php');
                require (__DIR__ . '/Routes/Backend/Access.php');
                require (__DIR__ . '/Routes/Backend/LogViewer.php');
            });
        });
    });
});