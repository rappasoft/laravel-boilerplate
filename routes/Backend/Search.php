<?php

Route::namespace('Search')->prefix('search')->as('search.')->group(function() {

    /*
     * Search Specific Functionality
     */
    Route::name('index')->get('/', 'SearchController@index');
});