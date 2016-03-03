<?php

Breadcrumbs::register('admin.access.roles.permission-group.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.roles.permissions.index');
    $breadcrumbs->push(trans('menus.backend.access.permissions.groups.create'), route('admin.access.roles.permission-group.create'));
});

Breadcrumbs::register('admin.access.roles.permission-group.edit', function ($breadcrumbs, $group) {
    $breadcrumbs->parent('admin.access.roles.permissions.index');
    $breadcrumbs->push(trans('menus.backend.access.permissions.groups.edit'), route('admin.access.roles.permission-group.edit', $group));
});