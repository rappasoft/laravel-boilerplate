<?php

namespace App\Repositories\Backend\Auth;

use App\Repositories\Traits\CacheResults;
use App\Repositories\BaseEloquentRepository;
use Spatie\Permission\Models\Role;

/**
 * Class RoleRepository.
 */
class RoleRepository extends BaseEloquentRepository
{
	use CacheResults;

	protected $relationships = ['permissions', 'users'];

	/**
	 * @var string
	 */
	protected $model = Role::class;
}
