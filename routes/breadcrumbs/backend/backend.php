<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('Dashboard'), route('admin.dashboard'));
});

require __DIR__.'/auth.php';
