<?php

$router->group(['prefix' => 'install', 'middleware' => 'app.isInstalled', 'namespace' => 'Installer'], function()
{
    get('/', function() {
       echo "test";
    });
});