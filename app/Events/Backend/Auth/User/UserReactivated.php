<?php

namespace App\Events\Backend\Auth\User;

use Illuminate\Queue\SerializesModels;

/**
 * Class UserReactivated.
 */
class UserReactivated
{
    use SerializesModels;

    /**
     * @var
     */
    public $user;

    /**
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
}
