<?php

namespace App\Models\Access\Permission\Traits\Relationship;

use App\Models\Access\Permission\Permission;

/**
 * Class PermissionDependencyRelationship
 * @package App\Models\Access\Permission\Traits\Relationship
 */
trait PermissionDependencyRelationship
{
    /**
     * @return mixed
     */
    public function permission()
    {
        return $this->hasOne(Permission::class, 'id', 'dependency_id');
    }
}
