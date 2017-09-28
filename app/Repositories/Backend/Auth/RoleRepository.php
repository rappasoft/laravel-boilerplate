<?php

namespace App\Repositories\Backend\Auth;

use Spatie\Permission\Models\Role;
use App\Repositories\Traits\CacheResults;
use App\Repositories\BaseEloquentRepository;

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
