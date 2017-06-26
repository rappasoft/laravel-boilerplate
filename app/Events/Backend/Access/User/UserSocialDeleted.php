<?php

namespace App\Events\Backend\Access\User;

use Illuminate\Queue\SerializesModels;

/**
 * Class UserSocialDeleted.
 */
class UserSocialDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $user;

    /**
     * @var
     */
    public $social;

    /**
     * UserSocialDeleted constructor.
     *
     * @param $user
     * @param $social
     */
    public function __construct($user, $social)
    {
        $this->user = $user;
        $this->social = $social;
    }
}
