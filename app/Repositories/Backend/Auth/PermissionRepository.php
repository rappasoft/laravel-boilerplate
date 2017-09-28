<?php

namespace App\Repositories\Backend\Auth;

use App\Repositories\Traits\CacheResults;
use App\Repositories\BaseEloquentRepository;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRepository.
 */
class PermissionRepository extends BaseEloquentRepository
{
	use CacheResults;

	/**
	 * @var array
	 */
	protected $relationships = ['roles', 'users'];

	/**
	 * @var string
	 */
	protected $model = Permission::class;
}