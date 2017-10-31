<?php

namespace App\Repositories\Backend\Auth;

use App\Repositories\BaseRepository;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRepository.
 */
class PermissionRepository extends BaseRepository
{

	/**
	 * @return string
	 */
	function model()
	{
		return Permission::class;
	}
}