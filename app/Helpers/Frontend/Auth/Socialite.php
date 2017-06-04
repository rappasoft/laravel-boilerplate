<?php

namespace App\Helpers\Frontend\Auth;

/**
 * Class Socialite.
 */
class Socialite
{
    /**
     * Generates social login links based on what is enabled.
     *
     * @return string
     */
    public function getSocialLinks()
    {
        $socialite_enable = [];
        $socialite_links = '';

        if (config('services.bitbucket.client_id')) {
            $socialite_enable[] = link_to_route('frontend.auth.social.login', trans('labels.frontend.auth.login_with', ['social_media' => 'Bit Bucket']), 'bitbucket');
        }

        if (config('services.facebook.client_id')) {
            $socialite_enable[] = link_to_route('frontend.auth.social.login', trans('labels.frontend.auth.login_with', ['social_media' => 'Facebook']), 'facebook');
        }

        if (config('services.google.client_id')) {
            $socialite_enable[] = link_to_route('frontend.auth.social.login', trans('labels.frontend.auth.login_with', ['social_media' => 'Google']), 'google');
        }

        if (config('services.github.client_id')) {
            $socialite_enable[] = link_to_route('frontend.auth.social.login', trans('labels.frontend.auth.login_with', ['social_media' => 'Github']), 'github');
        }

        if (config('services.linkedin.client_id')) {
            $socialite_enable[] = link_to_route('frontend.auth.social.login', trans('labels.frontend.auth.login_with', ['social_media' => 'Linked In']), 'linkedin');
        }

        if (config('services.twitter.client_id')) {
            $socialite_enable[] = link_to_route('frontend.auth.social.login', trans('labels.frontend.auth.login_with', ['social_media' => 'Twitter']), 'twitter');
        }

        for ($i = 0; $i < count($socialite_enable); $i++) {
            $socialite_links .= ($socialite_links != '' ? '&nbsp;|&nbsp;' : '').$socialite_enable[$i];
        }

        return $socialite_links;
    }

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
