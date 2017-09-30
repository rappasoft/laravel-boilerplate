<?php

Breadcrumbs::register('admin.auth.user.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.access.users.management'), route('admin.auth.user.index'));
});

Breadcrumbs::register('admin.auth.user.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.user.index');
    $breadcrumbs->push(__('labels.backend.access.users.create'), route('admin.auth.user.create'));
});

Breadcrumbs::register('admin.auth.user.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.view'), route('admin.auth.user.show', $id));
});
