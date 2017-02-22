<?php

Route::group(['namespace' => 'Search'], function() {
	Route::prefix('search')->as('search.')->group(function () {

		/*
		 * Search Specific Functionality
		 */
		Route::name('index')->get('/', 'SearchController@index');
	});
});