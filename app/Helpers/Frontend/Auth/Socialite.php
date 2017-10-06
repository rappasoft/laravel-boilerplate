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
        $socialite_links = '<hr>'.__('labels.frontend.auth.login_with_social').'<br>';

        if (config('services.bitbucket.active')) {
            $socialite_enable[] = "<a href='".route('frontend.auth.social.login', 'bitbucket')."' class='btn btn-sm btn-outline-info m-1'><i class='fa fa-bitbucket'></i> Bit Bucket</a>";
        }

        if (config('services.facebook.active')) {
            $socialite_enable[] = "<a href='".route('frontend.auth.social.login', 'facebook')."' class='btn btn-sm btn-outline-info m-1'><i class='fa fa-facebook'></i> Facebook</a>";
        }

        if (config('services.google.active')) {
            $socialite_enable[] = "<a href='".route('frontend.auth.social.login', 'google')."' class='btn btn-sm btn-outline-info m-1'><i class='fa fa-google'></i> Google</a>";
        }

        if (config('services.github.active')) {
            $socialite_enable[] = "<a href='".route('frontend.auth.social.login', 'github')."' class='btn btn-sm btn-outline-info m-1'><i class='fa fa-github'></i> Github</a>";
        }

        if (config('services.linkedin.active')) {
            $socialite_enable[] = "<a href='".route('frontend.auth.social.login', 'linkedin')."' class='btn btn-sm btn-outline-info m-1'><i class='fa fa-linkedin'></i> Linked In</a>";
        }

        if (config('services.twitter.active')) {
            $socialite_enable[] = "<a href='".route('frontend.auth.social.login', 'twitter')."' class='btn btn-sm btn-outline-info m-1'><i class='fa fa-twitter'></i> Twitter</a>";
        }

        for ($i = 0; $i < count($socialite_enable); $i++) {
            $socialite_links .= ($socialite_links != '' ? ' ' : '').$socialite_enable[$i];
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
