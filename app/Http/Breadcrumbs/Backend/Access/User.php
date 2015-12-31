<?php

Breadcrumbs::register('admin.access.users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.backend.access.users.management'), route('admin.access.users.index'));
});

Breadcrumbs::register('admin.access.users.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.users.index');
    $breadcrumbs->push(trans('menus.backend.access.users.deactivated'), route('admin.access.users.deactivated'));
});

Breadcrumbs::register('admin.access.users.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.users.index');
    $breadcrumbs->push(trans('menus.backend.access.users.deleted'), route('admin.access.users.deleted'));
});

Breadcrumbs::register('admin.access.users.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.users.index');
    $breadcrumbs->push(trans('menus.backend.access.users.create'), route('admin.access.users.create'));
});

Breadcrumbs::register('admin.access.users.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.users.index');
    $breadcrumbs->push(trans('menus.backend.access.users.edit'), route('admin.access.users.edit', $id));
});

Breadcrumbs::register('admin.access.user.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.users.index');
    $breadcrumbs->push(trans('menus.backend.access.users.change-password'), route('admin.access.user.change-password', $id));
});
