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
    public function model()
    {
        return Permission::class;
    }
}
