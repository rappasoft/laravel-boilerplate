<?php

Breadcrumbs::for('log-viewer::dashboard', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.log-viewer.main'), url('admin/log-viewer'));
});

Breadcrumbs::for('log-viewer::logs.list', function ($trail) {
    $trail->parent('log-viewer::dashboard');
    $trail->push(__('menus.backend.log-viewer.logs'), url('admin/log-viewer/logs'));
});

Breadcrumbs::for('log-viewer::logs.show', function ($trail, $date) {
    $trail->parent('log-viewer::logs.list');
    $trail->push($date, url('admin/log-viewer/logs/'.$date));
});

Breadcrumbs::for('log-viewer::logs.filter', function ($trail, $date, $filter) {
    $trail->parent('log-viewer::logs.show', $date);
    $trail->push(ucfirst($filter), url('admin/log-viewer/'.$date.'/'.$filter));
});
