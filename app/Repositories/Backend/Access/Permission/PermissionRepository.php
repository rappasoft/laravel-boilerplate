<?php

namespace App\Repositories\Backend\Access\Permission;

use App\Models\Access\Permission\Permission;
use App\Repositories\Repository;

/**
 * Class PermissionRepository.
 */
class PermissionRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Permission::class;
}
