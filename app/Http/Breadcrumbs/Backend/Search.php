<?php

Breadcrumbs::register('admin.search.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('Search Results'), route('admin.search.index'));
});
