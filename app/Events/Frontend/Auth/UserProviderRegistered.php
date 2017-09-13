<?php

namespace App\Events\Frontend\Auth;

use App\Models\Auth\User;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserProviderRegistered.
 */
class UserProviderRegistered
{
    use SerializesModels;

    /**
     * @var
     */
    public $user;

    /**
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
