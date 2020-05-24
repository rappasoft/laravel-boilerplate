<?php

Breadcrumbs::for('admin.auth.user.index', function ($trail) {
    $trail->push(__('User Management'), route('admin.auth.user.index'));
});

Breadcrumbs::for('admin.auth.user.create', function ($trail) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__('Create User'), route('admin.auth.user.create'));
});
