<?php

/**
 * Sets the specified locale to the session
 */
$router->get('lang/{lang}', 'LanguageController@languageRoute');
