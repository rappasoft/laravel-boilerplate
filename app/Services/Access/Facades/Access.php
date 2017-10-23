<?php

namespace App\Services\Access\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Access.
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
