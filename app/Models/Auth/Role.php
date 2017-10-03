<?php

namespace App\Models\Auth;

use App\Models\Auth\Traits\Attribute\RoleAttribute;

/**
 * Class Role
 *
 * @package App\Models\Auth
 */
class Role extends \Spatie\Permission\Models\Role
{
    use RoleAttribute;
}
