<?php

namespace App\Models\Auth;

use App\Models\Auth\Traits\Method\RoleMethod;
use App\Models\Auth\Traits\Attribute\RoleAttribute;

/**
 * Class Role.
 */
class Role extends \Spatie\Permission\Models\Role
{
    use RoleAttribute,
        RoleMethod;
}
