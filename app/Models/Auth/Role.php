<?php

namespace App\Models\Auth;

use OwenIt\Auditing\Auditable;
use App\Models\Auth\Traits\Method\RoleMethod;
use Spatie\Permission\Models\Role as SpatieRole;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * Class Role.
 */
class Role extends SpatieRole implements AuditableContract
{
    use Auditable,
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
