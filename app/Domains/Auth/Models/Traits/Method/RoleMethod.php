<?php

namespace App\Domains\Auth\Models\Traits\Method;

use Illuminate\Support\Collection;

/**
 * Trait RoleMethod.
 */
trait RoleMethod
{
    /**
     * @return Collection
     */
    public function getPermissionDescriptions(): Collection
    {
        return $this->permissions->pluck('description');
    }

    /**
     * @return mixed
     */
    public function isAdmin(): bool
    {
        return $this->id === config('access.roles.admin');
    }
}
