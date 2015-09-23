<?php

$router->group(['prefix' => 'install', 'as' => 'Installer::', 'middleware' => 'app.isInstalled', 'namespace' => 'Installer'], function()
{
    get('/', ['as' => 'welcome', 'uses' => 'WelcomeController@index']);
    get('requirements', ['as' => 'requirements', 'uses' => 'RequirementsController@index']);
    get('permissions', ['as' => 'permissions', 'uses' => 'PermissionsController@index']);
    get('database', ['as' => 'database', 'uses' => 'DatabaseController@index']);
});