<?php

namespace App\Models\Access\User\Traits;

use App\Notifications\Frontend\Auth\UserNeedsPasswordReset;

/**
 * Class UserSendPasswordReset
 * @package App\Models\Access\User\Traits
 */
trait UserSendPasswordReset
{
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserNeedsPasswordReset($token));
    }
}