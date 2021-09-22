<?php

namespace App\Domains\Announcement\Models\Traits\Scope;

/**
 * Class AnnouncementScope.
 */
trait AnnouncementScope
{
    /**
     * @param $query
     * @return mixed
     */
    public function scopeEnabled($query)
    {
        return $query->whereEnabled(true);
    }

    /**
     * @param $query
     * @param $area
     * @return mixed
     */
    public function scopeForArea($query, $area)
    {
        return $query->where(function ($query) use ($area) {
            $query->whereArea($area)
                ->orWhereNull('area');
        });
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeInTimeFrame($query)
    {
        return $query->where(function ($query) {
            $query->where(function ($query) {
                $query->whereNull('starts_at')
                    ->whereNull('ends_at');
            })->orWhere(function ($query) {
                $query->whereNotNull('starts_at')
                    ->whereNotNull('ends_at')
                    ->where('starts_at', '<=', now())
                    ->where('ends_at', '>=', now());
            })->orWhere(function ($query) {
                $query->whereNotNull('starts_at')
                    ->whereNull('ends_at')
                    ->where('starts_at', '<=', now());
            })->orWhere(function ($query) {
                $query->whereNull('starts_at')
                    ->whereNotNull('ends_at')
                    ->where('ends_at', '>=', now());
            });
        });
    }
}
