<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Drop-in replacement for jamesmills/laravel-timezone
 *
 * @method static string convertToLocal($utcTime, string $format = null, bool $includeTimezone = false)
 * @method static \Carbon\Carbon convertFromLocal($localTime)
 * @method static string getCurrentTimezone()
 * @method static array getTimezones()
 * @method static array getFormattedTimezones()
 * @method static \Carbon\Carbon now()
 * @method static \Carbon\Carbon today()
 */
class Timezone extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'timezone.service';
    }
}
