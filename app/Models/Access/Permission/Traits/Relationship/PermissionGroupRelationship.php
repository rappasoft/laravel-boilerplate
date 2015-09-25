<?php namespace App\Models\Access\Permission\Traits\Relationship;

use App\Models\Access\Permission\Permission;
use App\Models\Access\Permission\PermissionGroup;

/**
 * Class PermissionGroupRelationship
 * @package App\Models\Access\Permission\Traits\Relationship
 */
trait PermissionGroupRelationship {

    /**
     * @return mixed
     */
    public function children() {
        return $this->hasMany(PermissionGroup::class, 'parent_id', 'id')->orderBy('sort', 'asc');
    }

    /**
     * @return mixed
     */
    public function permissions() {
        return $this->hasMany(Permission::class, 'group_id')->orderBy('sort', 'asc');
    }
}