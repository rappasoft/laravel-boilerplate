<?php

namespace App\Domains\Auth\Observers;

use App\Domains\Auth\Models\User;

/**
 * Class UserObserver.
 */
class UserObserver
{
    /**
     * @param  User  $user
     */
    public function created(User $user): void
    {
        $this->logPasswordHistory($user);
    }

    /**
     * @param  User  $user
     */
    public function updated(User $user): void
    {
        // Only log password history on update if the password actually changed
        if ($user->isDirty('password')) {
            $this->logPasswordHistory($user);
        }
    }

    /**
     * @param  User  $user
     */
    private function logPasswordHistory(User $user): void
    {
        if (config('boilerplate.access.user.password_history')) {
            $user->passwordHistories()->create([
                'password' => $user->password, // Password already hashed & saved so just take from model
            ]);
        }
    }
}
