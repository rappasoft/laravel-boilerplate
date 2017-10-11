<?php

Breadcrumbs::register('log-viewer::dashboard', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('menus.backend.log-viewer.main'), url('admin/log-viewer'));
});

Breadcrumbs::register('log-viewer::logs.list', function ($breadcrumbs) {
    $breadcrumbs->parent('log-viewer::dashboard');
    $breadcrumbs->push(__('menus.backend.log-viewer.logs'), url('admin/log-viewer/logs'));
});

Breadcrumbs::register('log-viewer::logs.show', function ($breadcrumbs, $date) {
    $breadcrumbs->parent('log-viewer::logs.list');
    $breadcrumbs->push($date, url('admin/log-viewer/logs/'.$date));
});

Breadcrumbs::register('log-viewer::logs.filter', function ($breadcrumbs, $date, $filter) {
    $breadcrumbs->parent('log-viewer::logs.show', $date);
    $breadcrumbs->push(ucfirst($filter), url('admin/log-viewer/'.$date.'/'.$filter));
});
