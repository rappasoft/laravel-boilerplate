<?php

namespace App\Domains\Auth\Models\Traits\Scope;

/**
 * Class RoleScope.
 */
trait RoleScope
{
    /**
     * @param $query
     * @param $term
     *
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where(function ($query) use ($term) {
            $query->where('name', 'like', '%'.$term.'%')
                ->orWhereHas('permissions', function ($query) use ($term) {
                    $query->where('description', 'like', '%'.$term.'%');
                });
        });
    }
}
