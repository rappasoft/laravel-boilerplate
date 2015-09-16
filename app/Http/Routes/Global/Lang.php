<?php

/**
 * Sets the specified locale to the session
 */
get('lang/{lang}', function($lang)
{
    session()->put('locale', $lang);
    return redirect()->back();
});