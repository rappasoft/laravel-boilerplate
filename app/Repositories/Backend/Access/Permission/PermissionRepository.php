<?php

namespace App\Repositories\Backend\Access\Permission;

use App\Repositories\Repository;
use App\Models\Access\Permission\Permission;

/**
 * Class PermissionRepository
 * @package App\Repositories\Permission
 */
class PermissionRepository extends Repository
{
	/**
	 * Associated Repository Model
	 */
	const MODEL = Permission::class;
}