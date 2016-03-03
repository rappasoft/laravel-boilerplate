<?php

Breadcrumbs::register('admin.access.roles.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.access.roles.management'), route('admin.access.roles.index'));
});

Breadcrumbs::register('admin.access.roles.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.roles.index');
    $breadcrumbs->push(trans('menus.backend.access.roles.create'), route('admin.access.roles.create'));
});

Breadcrumbs::register('admin.access.roles.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.roles.index');
    $breadcrumbs->push(trans('menus.backend.access.roles.edit'), route('admin.access.roles.edit', $id));
});