<?php

/**
 * This overwrites the Log Viewer Package routes so we can use middleware to protect it the way we want
 * You shouldn't have to change anything
 */
Route::group([
    'prefix'     => 'log-viewer',
], function() {
    Route::get('/', [
        'as'   => 'log-viewer::dashboard',
        'uses' => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index',
    ]);

    Route::group([
        'prefix' => 'logs',
    ], function() {
        Route::get('/', [
            'as'   => 'log-viewer::logs.list',
            'uses' => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs',
        ]);
        Route::delete('delete', [
            'as'   => 'log-viewer::logs.delete',
            'uses' => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete',
        ]);
    });

    Route::group([
        'prefix' => '{date}',
    ], function() {
        Route::get('/', [
            'as'   => 'log-viewer::logs.show',
            'uses' => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show',
        ]);
        Route::get('download', [
            'as'   => 'log-viewer::logs.download',
            'uses' => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download',
        ]);
        Route::get('{level}', [
            'as'   => 'log-viewer::logs.filter',
            'uses' => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel',
        ]);
    });
});
