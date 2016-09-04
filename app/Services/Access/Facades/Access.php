<?php

namespace App\Services\Access\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Access
 * @package App\Services\Access\Facades
 */
class Access extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'access';
    }
}