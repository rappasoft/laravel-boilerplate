<?php

namespace App\Models\Auth;

use Altek\Accountant\Contracts\Recordable;
use App\Models\Auth\Traits\Method\RoleMethod;
use Spatie\Permission\Models\Role as SpatieRole;
use Altek\Accountant\Recordable as RecordableTrait;

/**
 * Class Role.
 */
class Role extends SpatieRole implements Recordable
{
    use RecordableTrait,
        RoleMethod;
}
