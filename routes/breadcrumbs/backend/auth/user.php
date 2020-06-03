<?php

Breadcrumbs::for('admin.auth.user.index', function ($trail) {
    $trail->push(__('User Management'), route('admin.auth.user.index'));
});

Breadcrumbs::for('admin.auth.user.create', function ($trail) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__('Create User'), route('admin.auth.user.create'));
});

Breadcrumbs::for('admin.auth.user.show', function ($trail, $user) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__($user->name), route('admin.auth.user.show', $user));
});

Breadcrumbs::for('admin.auth.user.edit', function ($trail, $user) {
    $trail->parent('admin.auth.user.show', $user);
    $trail->push(__('Edit User'), route('admin.auth.user.edit', $user));
});

Breadcrumbs::for('admin.auth.user.change-password', function ($trail, $user) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__('Change Password'), route('admin.auth.user.change-password', $user));
});

Breadcrumbs::for('admin.auth.user.deleted', function ($trail) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__('Deleted Users'), route('admin.auth.user.deleted'));
});

Breadcrumbs::for('admin.auth.user.deactivated', function ($trail) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__('Deactivated Users'), route('admin.auth.user.deactivated'));
});
