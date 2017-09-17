<?php

Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push(trans('strings.backend.dashboard.title'), route('admin.dashboard'));
});
