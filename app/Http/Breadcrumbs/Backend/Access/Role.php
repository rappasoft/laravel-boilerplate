<?php

Breadcrumbs::register('admin.access.role.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('Role Management'), route('admin.access.role.index'));
});

Breadcrumbs::register('admin.access.role.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.role.index');
    $breadcrumbs->push(__('Create Role'), route('admin.access.role.create'));
});

Breadcrumbs::register('admin.access.role.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.role.index');
    $breadcrumbs->push(__('Edit Role'), route('admin.access.role.edit', $id));
});
