<?php

use JamesMills\LaravelTimezone\Timezone;
use Carbon\Carbon;

if (! function_exists('timezone')) {
    /**
     * Access the timezone helper.
     */
    function timezone()
    {
        return resolve(Timezone::class);
    }
}

if (! function_exists('userTimezone')) {
    /**
     * Get the current user's timezone or default to UTC
     */
    function userTimezone()
    {
        if (auth()->check() && auth()->user()->timezone) {
            return auth()->user()->timezone;
        }

        return config('app.timezone', 'UTC');
    }
}

if (! function_exists('toUserTimezone')) {
    /**
     * Convert a date to the user's timezone
     */
    function toUserTimezone($date, $format = null)
    {
        if (!$date) {
            return null;
        }

        try {
            $carbon = $date instanceof Carbon ? $date : Carbon::parse($date);

            if (function_exists('timezone') && auth()->check() && auth()->user()->timezone) {
                $converted = timezone()->convertToLocal($carbon);
            } else {
                $converted = $carbon->setTimezone(userTimezone());
            }

            return $format ? $converted->format($format) : $converted;
        } catch (Exception $e) {
            return $date;
        }
    }
}

if (! function_exists('formatUserDate')) {
    /**
     * Format a date in the user's timezone with a specific format
     */
    function formatUserDate($date, $format = null)
    {
        $format = $format ?: config('timezone.format', 'l, F jS Y, g:i A T');
        $converted = toUserTimezone($date);

        return $converted ? $converted->format($format) : 'N/A';
    }
}

if (! function_exists('formatUserDateShort')) {
    /**
     * Format a date in the user's timezone with a short format
     */
    function formatUserDateShort($date)
    {
        return formatUserDate($date, config('timezone.short_format', 'M j, Y g:i A'));
    }
}

if (! function_exists('formatUserDateOnly')) {
    /**
     * Format just the date part in the user's timezone
     */
    function formatUserDateOnly($date)
    {
        return formatUserDate($date, config('timezone.date_format', 'F jS, Y'));
    }
}

if (! function_exists('formatUserTimeOnly')) {
    /**
     * Format just the time part in the user's timezone
     */
    function formatUserTimeOnly($date)
    {
        return formatUserDate($date, config('timezone.time_format', 'g:i A T'));
    }
}

if (! function_exists('fromUserTimezone')) {
    /**
     * Convert a date from user's timezone to UTC for storage
     */
    function fromUserTimezone($date)
    {
        if (!$date) {
            return null;
        }

        try {
            $carbon = $date instanceof Carbon ? $date : Carbon::parse($date);

            if (function_exists('timezone') && auth()->check() && auth()->user()->timezone) {
                return timezone()->convertFromLocal($carbon);
            } else {
                return $carbon->setTimezone('UTC');
            }
        } catch (Exception $e) {
            return $date;
        }
    }
}

if (! function_exists('getCommonTimezones')) {
    /**
     * Get list of common business timezones for forms
     */
    function getCommonTimezones()
    {
        return config('timezone.common_timezones', []);
    }
}

if (! function_exists('getUserTimezoneInfo')) {
    /**
     * Get detailed information about the user's current timezone
     */
    function getUserTimezoneInfo()
    {
        $tz = userTimezone();

        try {
            $timezone = new DateTimeZone($tz);
            $datetime = new DateTime('now', $timezone);

            return [
                'name' => $tz,
                'offset' => $timezone->getOffset($datetime),
                'offset_hours' => $timezone->getOffset($datetime) / 3600,
                'formatted_offset' => $datetime->format('P'),
                'abbreviation' => $datetime->format('T'),
                'is_dst' => $datetime->format('I') == '1',
            ];
        } catch (Exception $e) {
            return [
                'name' => $tz,
                'offset' => 0,
                'offset_hours' => 0,
                'formatted_offset' => '+00:00',
                'abbreviation' => 'UTC',
                'is_dst' => false,
            ];
        }
    }
}
