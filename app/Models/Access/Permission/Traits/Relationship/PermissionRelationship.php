<?php

namespace App\Models\Access\Permission\Traits\Relationship;

/**
 * Class PermissionRelationship
 * @package App\Models\Access\Permission\Traits\Relationship
 */
trait PermissionRelationship
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(config('access.role'), config('access.permission_role_table'), 'permission_id', 'role_id');
    }
}