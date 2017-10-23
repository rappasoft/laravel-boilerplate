<?php

Breadcrumbs::register('admin.access.role.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.access.roles.management'), route('admin.access.role.index'));
});

Breadcrumbs::register('admin.access.role.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.role.index');
    $breadcrumbs->push(trans('menus.backend.access.roles.create'), route('admin.access.role.create'));
});

Breadcrumbs::register('admin.access.role.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.role.index');
    $breadcrumbs->push(trans('menus.backend.access.roles.edit'), route('admin.access.role.edit', $id));
});
