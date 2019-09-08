<?php

namespace App\Models\Auth;

use App\Models\Auth\Traits\Method\RoleMethod;
use Spatie\Permission\Models\Role as SpatieRole;

/**
 * Class Role.
 */
class Role extends SpatieRole
{
    use RoleMethod;
}
