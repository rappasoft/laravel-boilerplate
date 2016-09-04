<?php

/**
 * Global helpers file with misc functions
 *
 */

if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (! function_exists('access')) {
    /**
     * Access (lol) the Access:: facade as a simple function
     */
    function access()
    {
        return app('access');
    }
}

if ( ! function_exists('history'))
{
    /**
     * Access the history facade anywhere
     */
    function history()
    {
        return app('history');
    }
}

if (! function_exists('javascript')) {
    /**
     * Access the javascript helper
     */
    function javascript()
    {
        return app('JavaScript');
    }
}

if (! function_exists('gravatar')) {
    /**
     * Access the gravatar helper
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (! function_exists('getFallbackLocale')) {
    /**
     * Get the fallback locale
     *
     * @return \Illuminate\Foundation\Application|mixed
     */
    function getFallbackLocale()
    {
        return config('app.fallback_locale');
    }
}

if (! function_exists('getLanguageBlock')) {

    /**
     * Get the language block with a fallback
     *
     * @param $view
     * @param array $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getLanguageBlock($view, $data = [])
    {
        $components = explode("lang", $view);
        $current  = $components[0]."lang.".app()->getLocale().".".$components[1];
        $fallback  = $components[0]."lang.".getFallbackLocale().".".$components[1];

        if (view()->exists($current)) {
            return view($current, $data);
        } else {
            return view($fallback, $data);
        }
    }
}