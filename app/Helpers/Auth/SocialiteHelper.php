<?php

namespace App\Helpers\Auth;

/**
 * Class Socialite.
 */
class SocialiteHelper
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

        if (config('services.bitbucket.active')) {
            $socialite_enable[] = "<a href='".route('frontend.auth.social.login', 'bitbucket')."' class='btn btn-sm btn-outline-info m-1'><i class='fab fa-bitbucket'></i>  ".__('labels.frontend.auth.login_with', ['social_media' => 'BitBucket']).'</a>';
        }

        if (config('services.facebook.active')) {
            $socialite_enable[] = "<a href='".route('frontend.auth.social.login', 'facebook')."' class='btn btn-sm btn-outline-info m-1'><i class='fab fa-facebook'></i>  ".__('labels.frontend.auth.login_with', ['social_media' => 'Facebook']).'</a>';
        }

        if (config('services.google.active')) {
            $socialite_enable[] = "<a href='".route('frontend.auth.social.login', 'google')."' class='btn btn-sm btn-outline-info m-1'><i class='fab fa-google'></i>  ".__('labels.frontend.auth.login_with', ['social_media' => 'Google']).'</a>';
        }

        if (config('services.github.active')) {
            $socialite_enable[] = "<a href='".route('frontend.auth.social.login', 'github')."' class='btn btn-sm btn-outline-info m-1'><i class='fab fa-github'></i> ".__('labels.frontend.auth.login_with', ['social_media' => 'Github']).'</a>';
        }

        if (config('services.linkedin.active')) {
            $socialite_enable[] = "<a href='".route('frontend.auth.social.login', 'linkedin')."' class='btn btn-sm btn-outline-info m-1'><i class='fab fa-linkedin'></i>  ".__('labels.frontend.auth.login_with', ['social_media' => 'LinkedIn']).'</a>';
        }

        if (config('services.twitter.active')) {
            $socialite_enable[] = "<a href='".route('frontend.auth.social.login', 'twitter')."' class='btn btn-sm btn-outline-info m-1'><i class='fab fa-twitter'></i>  ".__('labels.frontend.auth.login_with', ['social_media' => 'Twitter']).'</a>';
        }

        if ($count = count($socialite_enable)) {
            $socialite_links .= '<hr />';
        }

        for ($i = 0; $i < $count; $i++) {
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
