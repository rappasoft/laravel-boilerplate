<?php


use App\Services\TimezoneService;

if (! function_exists('timezone')) {
    if (! function_exists('timezone')) {
        /**
         * Access the timezone helper - drop-in replacement for jamesmills/laravel-timezone
         */
        function timezone()
        {
            return new class {
                public function convertToLocal($utcTime, string $format = null, bool $includeTimezone = false): string
                {
                    return TimezoneService::convertToLocal($utcTime, $format, $includeTimezone);
                }

                public function convertFromLocal($localTime)
                {
                    return TimezoneService::convertFromLocal($localTime);
                }

                public function getCurrentTimezone(): string
                {
                    return TimezoneService::getCurrentTimezone();
                }

                public function getTimezones(): array
                {
                    return TimezoneService::getTimezones();
                }

                public function getFormattedTimezones(): array
                {
                    return TimezoneService::getFormattedTimezones();
                }

                public function now()
                {
                    return TimezoneService::now();
                }

                public function today()
                {
                    return TimezoneService::today();
                }
            };
        }
    }

    if (! function_exists('convert_to_local_timezone')) {
        /**
         * Convert UTC to local timezone
         */
        function convert_to_local_timezone($utcTime, string $format = null, bool $includeTimezone = false): string
        {
            return TimezoneService::convertToLocal($utcTime, $format, $includeTimezone);
        }
    }

    if (! function_exists('convert_from_local_timezone')) {
        /**
         * Convert local timezone to UTC
         */
        function convert_from_local_timezone($localTime)
        {
            return TimezoneService::convertFromLocal($localTime);
        }
    }

    if (! function_exists('user_timezone')) {
        /**
         * Get current user's timezone
         */
        function user_timezone(): string
        {
            return TimezoneService::getCurrentTimezone();
        }
    }
}
