<?php

namespace App\Models\Auth\Traits\Method;

/**
 * Trait RoleMethod.
 */
trait RoleMethod
{
    /**
     * @return mixed
     */
    public function isSuperAdmin()
    {
        return $this->name === config('access.users.super_admin_role');
    }
    public function isAdmin()
    {
        return $this->name === config('access.users.admin_role');
    }
}
