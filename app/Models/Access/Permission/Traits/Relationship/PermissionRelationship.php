<?php

namespace App\Models\Access\Permission\Traits\Relationship;

use App\Models\Access\Permission\PermissionDependency;
use App\Models\Access\Permission\PermissionGroup;

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

    /**
     * @return mixed
     */
    public function group()
    {
        return $this->belongsTo(PermissionGroup::class, 'group_id');
    }

    /**
     * @return mixed
     */
    public function users()
    {
        return $this->belongsToMany(config('auth.model'), config('access.permission_user_table'), 'permission_id', 'user_id');
    }

    /**
     * @return mixed
     */
    public function dependencies()
    {
        return $this->hasMany(PermissionDependency::class, 'permission_id', 'id');
    }
}
