<?php

namespace App\Domains\Auth\Models;

use App\Domains\Auth\Models\Traits\Attribute\UserAttribute;
use App\Domains\Auth\Models\Traits\Method\UserMethod;
use App\Domains\Auth\Models\Traits\Relationship\UserRelationship;
use App\Domains\Auth\Models\Traits\Scope\UserScope;

/**
 * Class User.
 */
class User extends BaseUser
{
    use UserAttribute,
        UserMethod,
        UserRelationship,
        UserScope;
}
