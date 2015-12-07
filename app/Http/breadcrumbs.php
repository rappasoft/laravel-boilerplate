<?php

Breadcrumbs::register('backend.dashboard', function($breadcrumbs)
{
    $breadcrumbs->push('Dashboard', route('backend.dashboard'));
});

require(__DIR__ . "/Breadcrumbs/Backend/Access.php");
require(__DIR__ . "/Breadcrumbs/Backend/LogViewer.php");