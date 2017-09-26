<?php

Breadcrumbs::register('admin.auth.user.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.access.users.management'), route('admin.auth.user.index'));
});

Breadcrumbs::register('admin.auth.user.create', function ($breadcrumbs) {
	$breadcrumbs->parent('admin.dashboard');
	$breadcrumbs->push(__('labels.backend.access.users.create'), route('admin.auth.user.create'));
});
