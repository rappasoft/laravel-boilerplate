<?php

namespace App\Repositories\Backend\Access\Permission;

use App\Repositories\Repository;
use App\Models\Access\Permission\Permission;

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
