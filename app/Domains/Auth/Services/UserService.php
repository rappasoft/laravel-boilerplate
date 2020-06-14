<?php

namespace App\Domains\Auth\Services;

use App\Exceptions\GeneralException;
use App\Domains\Auth\Exceptions\RegisterException;
use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\Traits\HasAbilities;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService.
 */
class UserService extends BaseService
{
    use HasAbilities;

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
     * @param $token
     *
     * @return bool|\Illuminate\Database\Eloquent\Model
     */
    public function findByPasswordResetToken($token)
    {
        foreach (DB::table(config('auth.passwords.users.table'))->get() as $row) {
            if (password_verify($token, $row->token)) {
                return $this->getByColumn($row->email, 'email');
            }
        }

        return false;
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
                throw new RegisterException(__('There was a problem connecting to :provider', ['provider' => $provider]));
            }
        }

        return $user;
    }

    /**
     * @param  array  $data
     *
     * @return User
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): User
    {
        DB::beginTransaction();

        $user = $this->createUser([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'email_verified_at' => isset($data['email_verified']) && $data['email_verified'] === '1' ? now() : null,
            'active' => isset($data['active']) && $data['active'] === '1',
        ]);

        if ($user) {
            // Add selected roles/permissions
            $user->syncRoles($this->getRoles($data));
            $user->syncPermissions($this->getPermissions($data));

            DB::commit();

            // They didn't want to auto verify the email, but do they want to send the confirmation email to do so?
            if (! isset($data['email_verified']) && isset($data['send_confirmation_email']) && $data['send_confirmation_email'] === '1') {
                $user->sendEmailVerificationNotification();
            }

            return $user;
        }

        DB::rollBack();
        throw new GeneralException(__('There was a problem creating this user. Please try again.'));
    }

    /**
     * @param  User  $user
     * @param  array  $data
     *
     * @return User
     * @throws \Throwable
     */
    public function update(User $user, array $data = []): User
    {
        DB::beginTransaction();

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        if (! $user->isMasterAdmin()) {
            // Replace selected roles/permissions
            $user->syncRoles($this->getRoles($data));
            $user->syncPermissions($this->getPermissions($data));
        }

        DB::commit();

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
     * @param  bool  $expired
     *
     * @return User
     * @throws \Throwable
     */
    public function updatePassword(User $user, $data, $expired = false): User
    {
        if (isset($data['current_password'])) {
            throw_if(
                ! Hash::check($data['current_password'], $user->password),
                new GeneralException(__('That is not your old password.'))
            );
        }

        // Reset the expiration clock
        if ($expired) {
            $user->password_changed_at = now();
        }

        $user->password = $data['password'];

        return tap($user)->update();
    }

    /**
     * @param  User  $user
     * @param $status
     *
     * @return User
     * @throws GeneralException
     */
    public function mark(User $user, $status): User
    {
        if ($status === 0 && auth()->id() === $user->id) {
            throw new GeneralException(__('You can not do that to yourself.'));
        }

        if ($status === 0 && $user->isMasterAdmin()) {
            throw new GeneralException(__('You can not deactivate the administrator account.'));
        }

        $user->active = $status;

        if ($user->save()) {
            return $user;
        }

        throw new GeneralException(__('There was a problem updating this user. Please try again.'));
    }

    /**
     * @param  User  $user
     *
     * @return User
     * @throws GeneralException
     */
    public function delete(User $user): User
    {
        if ($user->id === auth()->id()) {
            throw new GeneralException(__('You can not delete yourself.'));
        }

        if ($user->deleted_at !== null) {
            throw new GeneralException(__('This user is already deleted.'));
        }

        if ($this->deleteById($user->id)) {
            return $user;
        }

        throw new GeneralException('There was a problem deleting this user. Please try again.');
    }

    /**
     * @param User $user
     *
     * @throws GeneralException
     * @return User
     */
    public function restore(User $user): User
    {
        if ($user->deleted_at === null) {
            throw new GeneralException(__('This user is not deleted so it can not be restored.'));
        }

        if ($user->restore()) {
            return $user;
        }

        throw new GeneralException(__('There was a problem restoring this user. Please try again.'));
    }

    /**
     * @param  User  $user
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(User $user): bool
    {
        if ($user->deleted_at === null) {
            throw new GeneralException(__('This user is not deleted so it can not be permanently deleted.'));
        }

        if ($user->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this user. Please try again.'));
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
        return $user->assignRole(config('boilerplate.access.role.default'));
    }
}
