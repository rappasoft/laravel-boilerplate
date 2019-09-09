<?php

namespace App\Helpers\Auth;

/**
 * Class Socialite.
 */
class SocialiteHelper
{
    /**
     * List of the accepted third party provider types to login with.
     *
     * @return array
     */
    public function getAcceptedProviders()
    {
        return [
            'bitbucket',
            'facebook',
            'google',
            'github',
            'linkedin',
            'twitter',
        ];
    }
}
