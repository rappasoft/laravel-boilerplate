<?php

Breadcrumbs::register('admin.search.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('strings.backend.search.title'), route('admin.search.index'));
});
