<?php

Breadcrumbs::for('admin.history.index', function ($trail) {
	$trail->push(__('labels.backend.access.users.tabs.titles.history'), route('admin.history.index'));
});
