<?php

Breadcrumbs::register('admin.auth.role.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('menus.backend.access.roles.management'), route('admin.auth.role.index'));
});

Breadcrumbs::register('admin.auth.role.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.role.index');
    $breadcrumbs->push(__('menus.backend.access.roles.create'), route('admin.auth.role.create'));
});

Breadcrumbs::register('admin.auth.role.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.role.index');
    $breadcrumbs->push(__('menus.backend.access.roles.edit'), route('admin.auth.role.edit', $id));
});
