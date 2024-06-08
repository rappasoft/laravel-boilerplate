<?php

namespace App\Domains\Auth\Services;

use App\Domains\Auth\Events\User\UserCreated;
use App\Domains\Auth\Events\User\UserDeleted;
use App\Domains\Auth\Events\User\UserDestroyed;
use App\Domains\Auth\Events\User\UserRestored;
use App\Domains\Auth\Events\User\UserStatusChanged;
use App\Domains\Auth\Events\User\UserUpdated;
use App\Domains\Auth\Models\User;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
     * @param $type
     * @param  bool|int  $perPage
     * @return mixed
     */
    public function getByType($type, $perPage = false)
    {
        if (is_numeric($perPage)) {
            return $this->model::byType($type)->paginate($perPage);
        }

        return $this->model::byType($type)->get();
    }

    /**
     * @param  array  $data
     * @return mixed
     *
     * @throws GeneralException
     */
    public function registerUser(array $data = []): User
    {
        Log::info('Register user started', ['data' => $data]);

        DB::beginTransaction();

        try {
            if (request()->hasFile('profile_picture')) {
                $file = request()->file('profile_picture');
                $filename = Str::slug($data['name']) . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
                Log::info('filename', ['filename' => $filename]);

                $file->move(public_path('profile_pictures'), $filename);

                $data['profile_picture'] = $filename;
            } else {
                $data['profile_picture'] = null;
            }
            Log::info('Calling create user', ['data' => $data]);
            $user = $this->createUser($data);

            DB::commit();

            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('rolled back', ['exception' => $e->getMessage()]);

            throw new GeneralException(__('There was a problem creating your account.'));
        }
    }

    /**
     * @param $info
     * @param $provider
     * @return mixed
     *
     * @throws GeneralException
     */
    public function registerProvider($info, $provider): User
    {
        $user = $this->model::where('provider_id', $info->id)->first();

        if (! $user) {
            DB::beginTransaction();

            try {
                $user = $this->createUser([
                    'name' => $info->name,
                    'email' => $info->email,
                    'provider' => $provider,
                    'provider_id' => $info->id,
                    'email_verified_at' => now(),
                ]);
            } catch (Exception $e) {
                DB::rollBack();

                throw new GeneralException(__('There was a problem connecting to :provider', ['provider' => $provider]));
            }

            DB::commit();
        }

        return $user;
    }

    /**
     * @param  array  $data
     * @return User
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): User
    {
        DB::beginTransaction();

        try {
            if (request()->hasFile('profile_picture')) {
                $file = request()->file('profile_picture');
                $filename = Str::slug($data['name']) . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('profile_pictures'), $filename);
                $data['profile_picture'] = $filename;
            }

            $user = $this->createUser([
                'type' => $data['type'],
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'active' => $data['active'] ?? true,
                'email_verified_at' => isset($data['email_verified']) && $data['email_verified'] === '1' ? now() : null,
                'profile_picture' => $data['profile_picture'] ?? null,
            ]);

            $user->syncRoles($data['roles'] ?? []);

            if (! config('boilerplate.access.user.only_roles')) {
                $user->syncPermissions($data['permissions'] ?? []);
            }

            event(new UserCreated($user));

            DB::commit();

            return $user;
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this user. Please try again.'));
        }
    }


    /**
     * @param  User  $user
     * @param  array  $data
     * @return User
     *
     * @throws \Throwable
     */
    public function update(User $user, array $data = []): User
    {
        DB::beginTransaction();

        try {
            $updateData = [
                'type' => $user->isMasterAdmin() ? $this->model::TYPE_ADMIN : $data['type'] ?? $user->type,
                'name' => $data['name'],
                'email' => $data['email'],
            ];

            if (request()->hasFile('profile_picture')) {
                $file = request()->file('profile_picture');
                $filename = Str::slug($user->name) . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('profile_pictures'), $filename);

                if ($user->profile_picture && file_exists(public_path('profile_pictures/' . $user->profile_picture))) {
                    Log::info('Deleting old profile picture', ['path' => public_path('profile_pictures/' . $user->profile_picture)]);
                    unlink(public_path('profile_pictures/' . $user->profile_picture));
                }

                $updateData['profile_picture'] = $filename;
            }

            $user->update($updateData);

            if (! $user->isMasterAdmin()) {
                // Replace selected roles/permissions
                $user->syncRoles($data['roles'] ?? []);

                if (! config('boilerplate.access.user.only_roles')) {
                    $user->syncPermissions($data['permissions'] ?? []);
                }
            }

            event(new UserUpdated($user));

            DB::commit();

            return $user;
        } catch (Exception $e) {
            DB::rollBack();

            Log::error('Error updating user', ['exception' => $e->getMessage()]);

            throw new GeneralException(__('There was a problem updating this user. Please try again.'));
        }
    }


    /**
     * @param  User  $user
     * @param  array  $data
     * @return User
     */
    public function updateProfile(User $user, array $data = []): User
    {
        DB::beginTransaction();

        try {
            $user->name = $data['name'] ?? null;

            if ($user->canChangeEmail() && $user->email !== $data['email']) {
                $user->email = $data['email'];
                $user->email_verified_at = null;
                $user->sendEmailVerificationNotification();
                session()->flash('resent', true);
            }

            if (request()->hasFile('profile_picture')) {
                Log::info('profile_picture update');

                $file = request()->file('profile_picture');

                $filename = Str::slug($user->name) . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('profile_pictures'), $filename);

                if ($user->profile_picture && file_exists(public_path('profile_pictures/' . $user->profile_picture))) {
                    Log::info('old profile_picture delete', ['path' => public_path('profile_pictures/' . $user->profile_picture)]);
                    unlink(public_path('profile_pictures/' . $user->profile_picture));
                }
                $user->profile_picture = $filename;
            }

            $user->save();

            DB::commit();

            return $user;
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating your profile.'));
        }
    }

    /**
     * @param  User  $user
     * @param $data
     * @param  bool  $expired
     * @return User
     *
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
     * @return User
     *
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
            event(new UserStatusChanged($user, $status));

            return $user;
        }

        throw new GeneralException(__('There was a problem updating this user. Please try again.'));
    }

    /**
     * @param  User  $user
     * @return User
     *
     * @throws GeneralException
     */
    public function delete(User $user): User
    {
        if ($user->id === auth()->id()) {
            throw new GeneralException(__('You can not delete yourself.'));
        }

        if ($this->deleteById($user->id)) {
            event(new UserDeleted($user));

            return $user;
        }

        throw new GeneralException('There was a problem deleting this user. Please try again.');
    }

    /**
     * @param  User  $user
     * @return User
     *
     * @throws GeneralException
     */
    public function restore(User $user): User
    {
        if ($user->restore()) {
            event(new UserRestored($user));

            return $user;
        }

        throw new GeneralException(__('There was a problem restoring this user. Please try again.'));
    }

    /**
     * @param  User  $user
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(User $user): bool
    {
        if ($user->forceDelete()) {
            event(new UserDestroyed($user));

            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this user. Please try again.'));
    }

    /**
     * @param  array  $data
     * @return User
     */
    protected function createUser(array $data = []): User
    {
        return $this->model::create([
            'type' => $data['type'] ?? $this->model::TYPE_USER,
            'name' => $data['name'] ?? null,
            'email' => $data['email'] ?? null,
            'password' => Hash::make($data['password'] ?? null),
            'provider' => $data['provider'] ?? null,
            'provider_id' => $data['provider_id'] ?? null,
            'email_verified_at' => $data['email_verified_at'] ?? null,
            'active' => $data['active'] ?? true,
            'profile_picture' => $data['profile_picture'] ?? null,
        ]);
    }
}
