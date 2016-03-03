<?php

namespace App\Models\Access\Permission\Traits\Relationship;

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
        return $this->hasOne(config('access.permission'), 'id', 'dependency_id');
    }
}