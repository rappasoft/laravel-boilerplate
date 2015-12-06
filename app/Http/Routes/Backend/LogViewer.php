<?php

/**
 * This overwrites the Log Viewer Package routes so we can use middleware to protect it the way we want
 * You shouldn't have to change anything
 */
$router->group([
    'prefix' => 'log-viewer',
    'middleware' => 'access.routeNeedsPermission:view-backend'
], function() use ($router)
{
    $router->get('/', [
        'as'    => 'log-viewer::dashboard',
        'uses'  => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index',
    ]);

    $router->group([
        'prefix' => 'logs',
    ], function() use ($router) {
        $router->get('/', [
            'as'    => 'log-viewer::logs.list',
            'uses'  => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs',
        ]);
        $router->delete('delete', [
            'as'    => 'log-viewer::logs.delete',
            'uses'  => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete',
        ]);
    });

    $router->group([
        'prefix'    => '{date}',
    ], function() use ($router) {
        $router->get('/', [
            'as'    => 'log-viewer::logs.show',
            'uses'  => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show',
        ]);
        $router->get('download', [
            'as'    => 'log-viewer::logs.download',
            'uses'  => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download',
        ]);
        $router->get('{level}', [
            'as'    => 'log-viewer::logs.filter',
            'uses'  => '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel',
        ]);
    });
});