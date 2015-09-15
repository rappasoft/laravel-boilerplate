<?php

get('lang/{lang}', function($lang)
{
    session()->put('locale', $lang);
    return redirect()->back();
});