<?php

/**
 * Sets the specified locale to the session
 */
Route::get('lang/{lang}', 'LanguageController@swap');