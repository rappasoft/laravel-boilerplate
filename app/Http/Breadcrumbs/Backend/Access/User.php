<?php

Breadcrumbs::register('admin.access.user.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.backend.access.users.management'), route('admin.access.user.index'));
});

Breadcrumbs::register('admin.access.user.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.deactivated'), route('admin.access.user.deactivated'));
});

Breadcrumbs::register('admin.access.user.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.deleted'), route('admin.access.user.deleted'));
});

Breadcrumbs::register('admin.access.user.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.create'), route('admin.access.user.create'));
});

Breadcrumbs::register('admin.access.user.show', function ($breadcrumbs, $id) {
	$breadcrumbs->parent('admin.access.user.index');
	$breadcrumbs->push(trans('menus.backend.access.users.view'), route('admin.access.user.show', $id));
});

Breadcrumbs::register('admin.access.user.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.edit'), route('admin.access.user.edit', $id));
});

Breadcrumbs::register('admin.access.user.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.change-password'), route('admin.access.user.change-password', $id));
});
