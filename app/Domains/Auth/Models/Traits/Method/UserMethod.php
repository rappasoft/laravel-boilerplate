<?php

namespace App\Domains\Auth\Models\Traits\Method;

/**
 * Trait UserMethod.
 */
trait UserMethod
{
    /**
     * @return mixed
     */
    public function canChangeEmail()
    {
        return config('boilerplate.access.users.change_email');
    }

    /**
     * @return bool
     */
    public function isMasterAdmin()
    {
        return $this->id === 1;
    }

    /**
     * @return mixed
     */
    public function isAdmin()
    {
        return $this->hasRole(config('boilerplate.access.roles.admin'));
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @return bool
     */
    public function isVerified()
    {
        return $this->email_verified_at !== null;
    }

    /**
     * @return bool
     */
    public function isSocial()
    {
        return $this->provider !== null && $this->provider_id !== null;
    }

    /**
     * @param  bool  $size
     *
     * @return mixed|string
     * @throws \Creativeorange\Gravatar\Exceptions\InvalidEmailException
     */
    public function getAvatar($size = null)
    {
        return 'https://gravatar.com/avatar/'.md5(strtolower(trim($this->email))).'?s='.config('boilerplate.avatar.size', $size);
    }
}
