<?php

Breadcrumbs::register('admin.access.user.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('User Management'), route('admin.access.user.index'));
});

Breadcrumbs::register('admin.access.user.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.user.index');
    $breadcrumbs->push(__('Deactivated Users'), route('admin.access.user.deactivated'));
});

Breadcrumbs::register('admin.access.user.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.user.index');
    $breadcrumbs->push(__('Deleted Users'), route('admin.access.user.deleted'));
});

Breadcrumbs::register('admin.access.user.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.user.index');
    $breadcrumbs->push(__('Create User'), route('admin.access.user.create'));
});

Breadcrumbs::register('admin.access.user.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.user.index');
    $breadcrumbs->push(__('View User'), route('admin.access.user.show', $id));
});

Breadcrumbs::register('admin.access.user.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.user.index');
    $breadcrumbs->push(__('Edit User'), route('admin.access.user.edit', $id));
});

Breadcrumbs::register('admin.access.user.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.user.index');
    $breadcrumbs->push(__('Change Password'), route('admin.access.user.change-password', $id));
});
