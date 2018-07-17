<?php

namespace App\Models\Auth;

use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Auth\Traits\Method\RoleMethod;
use OwenIt\Auditing\Auditable as AuditableTrait;
use App\Models\Auth\Traits\Attribute\RoleAttribute;

/**
 * Class Role.
 */
class Role extends \Spatie\Permission\Models\Role implements Auditable
{
    use AuditableTrait,
        RoleAttribute,
        RoleMethod;
}
