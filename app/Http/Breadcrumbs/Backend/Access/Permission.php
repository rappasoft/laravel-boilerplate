<?php

Breadcrumbs::register('admin.access.roles.permissions.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.permission_management'), route('admin.access.roles.permissions.index'));
});

Breadcrumbs::register('admin.access.roles.permissions.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.roles.permissions.index');
    $breadcrumbs->push(trans('menus.create_permission'), route('admin.access.roles.permissions.create'));
});

Breadcrumbs::register('admin.access.roles.permissions.edit', function ($breadcrumbs, $perm) {
    $breadcrumbs->parent('admin.access.roles.permissions.index');
    $breadcrumbs->push(trans('menus.edit_permission'), route('admin.access.roles.permissions.edit', $perm));
});
