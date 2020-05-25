<?php

namespace App\Models\Traits\Scope;

/**
 * Class AnnouncementScope.
 */
trait AnnouncementScope
{
    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeEnabled($query)
    {
        return $query->whereEnabled(true);
    }
}
