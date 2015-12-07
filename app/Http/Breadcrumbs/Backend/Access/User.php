<?php

Breadcrumbs::register('admin.access.users.index', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.user_management'), route('admin.access.users.index'));
});

Breadcrumbs::register('admin.access.users.banned', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.access.users.index');
    $breadcrumbs->push(trans('menus.banned_users'), route('admin.access.users.banned'));
});

Breadcrumbs::register('admin.access.users.deactivated', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.access.users.index');
    $breadcrumbs->push(trans('menus.deactivated_users'), route('admin.access.users.deactivated'));
});

Breadcrumbs::register('admin.access.users.deleted', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.access.users.index');
    $breadcrumbs->push(trans('menus.deleted_users'), route('admin.access.users.deleted'));
});

Breadcrumbs::register('admin.access.users.create', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.access.users.index');
    $breadcrumbs->push(trans('menus.create_user'), route('admin.access.users.create'));
});

Breadcrumbs::register('admin.access.users.edit', function($breadcrumbs, $id)
{
    $breadcrumbs->parent('admin.access.users.index');
    $breadcrumbs->push(trans('menus.edit_user'), route('admin.access.users.edit', $id));
});

Breadcrumbs::register('admin.access.user.change-password', function($breadcrumbs, $id)
{
    $breadcrumbs->parent('admin.access.users.index');
    $breadcrumbs->push('Change Password', route('admin.access.user.change-password', $id));
});