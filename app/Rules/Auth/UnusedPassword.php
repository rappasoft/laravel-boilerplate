<?php

namespace App\Rules\Auth;

use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;
use App\Repositories\Backend\Auth\UserRepository as BackendUserRepository;
use App\Repositories\Frontend\Auth\UserRepository as FrontendUserRepository;

/**
 * Class UnusedPassword.
 */
class UnusedPassword implements Rule
{
    /**
     * @var
     */
    protected $user;

    /**
     * Create a new rule instance.
     *
     * @param $user
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Option is off
        if (! config('access.users.password_history')) {
            return true;
        }

        if (! $this->user instanceof User) {
            if (is_numeric($this->user)) {
                $this->user = resolve(BackendUserRepository::class)->getById($this->user);
            } else {
                $this->user = resolve(FrontendUserRepository::class)->findByPasswordResetToken($this->user);
            }
        }

        if (! $this->user || null === $this->user) {
            return false;
        }

        $histories = $this->user
            ->passwordHistories()
            ->take(config('access.users.password_history'))
            ->orderBy('id', 'desc')
            ->get();

        foreach ($histories as $history) {
            if (Hash::check($value, $history->password)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('auth.password_used');
    }
}
