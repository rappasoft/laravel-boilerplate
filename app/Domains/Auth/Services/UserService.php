<?php

namespace App\Services;

use App\Domains\Auth\Exceptions\GeneralException;
use App\Domains\Auth\Exceptions\RegisterException;
use App\Domains\Auth\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService.
 */
class UserService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param  User  $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * @param  array  $data
     *
     * @return mixed
     * @throws RegisterException
     */
    public function registerUser(array $data = []): User
    {
        $user = $this->createUser($data);

        if ($user) {
            $this->assignDefaultRole($user);
        } else {
            throw new RegisterException(__('There was a problem creating your account.'));
        }

        return $user;
    }

    /**
     * @param $info
     * @param $provider
     *
     * @return mixed
     * @throws RegisterException
     */
    public function registerProvider($info, $provider): User
    {
        $user = $this->model::where('provider_id', $info->id)->first();

        if (! $user) {
            $user = $this->createUser([
                'name' => $info->name,
                'email' => $info->email,
                'provider' => $provider,
                'provider_id' => $info->id,
                'email_verified_at' => now(),
            ]);

            if ($user) {
                $this->assignDefaultRole($user);
            } else {
                throw new RegisterException(__('There was a problem connecting to '.$provider));
            }
        }

        return $user;
    }

    /**
     * @param  User  $user
     * @param  array  $data
     *
     * @return User
     */
    public function updateProfile(User $user, array $data = []): User
    {
        $user->name = $data['name'] ?? null;

        if ($user->canChangeEmail() && $user->email !== $data['email']) {
            $user->email = $data['email'];
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
            session()->flash('resent', true);
        }

        return tap($user)->save();
    }

    /**
     * @param  User  $user
     * @param $data
     *
     * @return User
     * @throws \Throwable
     */
    public function updatePassword(User $user, $data): User
    {
        // TODO: Refactor the rest to throw_if
        throw_if(
            ! Hash::check($data['current_password'], $user->password),
            new GeneralException(__('That is not your old password.'))
        );

        return tap($user)->update(['password' => $data['password']]);
    }

    /**
     * @param  array  $data
     *
     * @return User
     */
    protected function createUser(array $data = []): User
    {
        return $this->model::create([
            'name' => $data['name'] ?? null,
            'email' => $data['email'] ?? null,
            'password' => $data['password'] ?? null,
            'provider' => $data['provider'] ?? null,
            'provider_id' => $data['provider_id'] ?? null,
            'email_verified_at' => $data['email_verified_at'] ?? null,
            'active' => $data['active'] ?? true,
        ]);
    }

    /**
     * @param  User  $user
     *
     * @return User
     */
    protected function assignDefaultRole(User $user): User
    {
        return $user->assignRole(config('boilerplate.access.roles.default'));
    }
}
