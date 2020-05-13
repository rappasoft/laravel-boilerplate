<?php

namespace App\Domains\Auth\Models;

use App\Domains\Auth\Models\Traits\Attribute\UserAttribute;
use App\Domains\Auth\Models\Traits\Method\UserMethod;

/**
 * Class User.
 */
class User extends BaseUser
{
    use UserAttribute,
        UserMethod;
}
