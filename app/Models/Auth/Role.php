<?php

namespace App\Models\Auth;

use App\Models\Auth\Traits\Method\RoleMethod;
use App\Models\Auth\Traits\Attribute\RoleAttribute;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

/**
 * Class Role.
 */
class Role extends \Spatie\Permission\Models\Role implements Auditable
{
    use AuditableTrait,
		RoleAttribute,
		RoleMethod;
}
