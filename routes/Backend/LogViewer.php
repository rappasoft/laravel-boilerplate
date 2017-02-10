<?php

/**
 * This overwrites the Log Viewer Package routes so we can use middleware to protect it the way we want
 * You shouldn't have to change anything
 * All route names are prefixed with 'admin.'.
 */
Route::prefix('log-viewer')->group(function () {
    Route::get('/', [
        'as'   => 'log-viewer::dashboard',
        'uses' => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index',
    ]);

	Route::prefix('logs')->group(function () {
        Route::get('/', [
            'as'   => 'log-viewer::logs.list',
            'uses' => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs',
        ]);

        Route::delete('delete', [
            'as'   => 'log-viewer::logs.delete',
            'uses' => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete',
        ]);
    });

	Route::prefix('{date}')->group(function () {
        Route::get('/', [
            'as'   => 'log-viewer::logs.show',
            'uses' => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show',
        ]);

        Route::get('/all', function ($date) {
            return redirect()->route('admin.log-viewer::logs.show', [$date]);
        });

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
