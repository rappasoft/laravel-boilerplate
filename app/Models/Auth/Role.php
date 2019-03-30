<?php

namespace App\Models\Auth;

use OwenIt\Auditing\Auditable;
use App\Models\Auth\Traits\Method\RoleMethod;
use Spatie\Permission\Models\Role as SpatieRole;
use App\Models\Auth\Traits\Attribute\RoleAttribute;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * Class Role.
 */
class Role extends SpatieRole implements AuditableContract
{
    use Auditable,
        RoleAttribute,
        RoleMethod;

    /**
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected $auditExclude = [
        'id',
    ];
}
