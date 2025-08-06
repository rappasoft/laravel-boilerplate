<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TimezoneService
{
    /**
     * Get current user's timezone or app default
     */
    public static function getCurrentTimezone(): string
    {
        if (Auth::check() && Auth::user()->timezone) {
            return Auth::user()->timezone;
        }

        return config('app.timezone', 'UTC');
    }

    /**
     * Convert UTC time to user's local timezone (compatible with jamesmills syntax)
     */
    public static function convertToLocal($utcTime, string $format = null, bool $includeTimezone = false): string
    {
        $timezone = self::getCurrentTimezone();
        $carbon = Carbon::parse($utcTime)->setTimezone($timezone);

        if ($format) {
            $result = $carbon->format($format);
            if ($includeTimezone) {
                $tzName = $carbon->timezone->getName();
                $cityName = substr($tzName, strrpos($tzName, '/') + 1);
                $cityName = str_replace('_', ' ', $cityName);
                return $result . ' ' . $cityName . ', ' . explode('/', $tzName)[0];
            }
            return $result;
        }

        return $carbon->toDateTimeString();
    }

    /**
     * Convert user's local time to UTC (compatible with jamesmills syntax)
     */
    public static function convertFromLocal($localTime): Carbon
    {
        $timezone = self::getCurrentTimezone();
        return Carbon::parse($localTime, $timezone)->utc();
    }

    /**
     * Get user's local "now"
     */
    public static function now(): Carbon
    {
        return Carbon::now(self::getCurrentTimezone());
    }

    /**
     * Get user's local "today"
     */
    public static function today(): Carbon
    {
        return Carbon::today(self::getCurrentTimezone());
    }

    /**
     * Get list of all timezones for select options
     */
    public static function getTimezones(): array
    {
        $zones = [];
        foreach (timezone_identifiers_list() as $zone) {
            $zones[$zone] = $zone;
        }
        return $zones;
    }

    /**
     * Get formatted timezone list for select dropdown
     */
    public static function getFormattedTimezones(): array
    {
        $zones = [];
        foreach (timezone_identifiers_list() as $zone) {
            try {
                $dt = new \DateTime('now', new \DateTimeZone($zone));
                $offset = $dt->format('P');
                $zones[$zone] = "(GMT/UTC {$offset}) " . str_replace('_', ' ', $zone);
            } catch (\Exception $e) {
                $zones[$zone] = $zone;
            }
        }
        return $zones;
    }
}
