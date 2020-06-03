<?php

namespace App\Domains\Auth\Rules;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\UserService;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

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
     * UnusedPassword constructor.
     *
     * @param $user
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
    public function passes($attribute, $value): bool
    {
        // Option is off
        if (! config('boilerplate.access.users.password_history')) {
            return true;
        }

        if (! $this->user instanceof User) {
            if (is_numeric($this->user)) {
                $this->user = resolve(UserService::class)->getById($this->user);
            } else {
                // TODO: Do I even need this? I have the email address to send through in ResetPasswordController i think
                $this->user = resolve(UserService::class)->findByPasswordResetToken($this->user);
            }
        }

        if (! $this->user || null === $this->user) {
            return false;
        }

        $histories = $this->user
            ->passwordHistories()
            ->take(config('boilerplate.access.users.password_history'))
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
    public function message(): string
    {
        return __('You can not set a password that you have previously used within the last :num times.', ['num' => config('boilerplate.access.users.password_history')]);
    }
}
