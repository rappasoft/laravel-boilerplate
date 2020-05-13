<?php

Breadcrumbs::for('admin.auth.role.index', function ($trail) {
    $trail->push(__('Role Management'), route('admin.auth.role.index'));
});

Breadcrumbs::for('admin.auth.role.create', function ($trail) {
    $trail->parent('admin.auth.role.index');
    $trail->push(__('Create Role'), route('admin.auth.role.create'));
});

Breadcrumbs::for('admin.auth.role.edit', function ($trail, $role) {
    $trail->parent('admin.auth.role.index');
    $trail->push(__('Edit Role'), route('admin.auth.role.edit', $role));
});
