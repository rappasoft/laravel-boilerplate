<?php

use Carbon\Carbon;
use JamesMills\LaravelTimezone\Timezone;

if (! function_exists('timezone')) {
    /**
     * Access the timezone helper.
     */
    function timezone()
    {
        return resolve(Timezone::class);
    }
}

if (! function_exists('carbon')) {
    /**
     * Create a new Carbon instance from a time
     *
     * @param $time
     *
     * @return Carbon
     * @throws Exception
     */
    function carbon($time)
    {
        return new Carbon($time);
    }
}
