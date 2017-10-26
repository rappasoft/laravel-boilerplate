<?php

namespace App\Repositories\Backend\Auth;

use Spatie\Permission\Models\Permission;
use App\Repositories\BaseRepository;

/**
 * Class PermissionRepository.
 */
class PermissionRepository extends BaseRepository
{

    /**
     * @var string
     */
    protected $model = Permission::class;
}
