<?php

Breadcrumbs::register('admin.access.roles.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.role_management'), route('admin.access.roles.index'));
});

Breadcrumbs::register('admin.access.roles.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.roles.index');
    $breadcrumbs->push(trans('menus.create_role'), route('admin.access.roles.create'));
});

Breadcrumbs::register('admin.access.roles.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.roles.index');
    $breadcrumbs->push(trans('menus.edit_role'), route('admin.access.roles.edit', $id));
});
