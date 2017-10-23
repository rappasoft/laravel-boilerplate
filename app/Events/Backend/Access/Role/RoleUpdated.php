<?php

namespace App\Events\Backend\Access\Role;

use Illuminate\Queue\SerializesModels;

/**
 * Class RoleUpdated.
 */
class RoleUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $role;

    /**
     * @param $role
     */
    public function __construct($role)
    {
        $this->role = $role;
    }
}
