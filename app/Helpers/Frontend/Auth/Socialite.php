<?php

namespace App\Helpers\Frontend\Auth;

/**
 * Class Socialite
 * @package App\Helpers\Frontend\Auth
 */
class Socialite {

	/**
	 * Generates social login links based on what is enabled
	 *
	 * @return string
	 */
	public function getSocialLinks()
	{
		$socialite_enable = [];
		$socialite_links  = '';

		if (strlen(getenv('BITBUCKET_CLIENT_ID'))) {
			$socialite_enable[] = link_to_route('frontend.auth.social.login', trans('labels.frontend.auth.login_with', ['social_media' => 'Bit Bucket']), 'bitbucket');
		}

		if (strlen(getenv('FACEBOOK_CLIENT_ID'))) {
			$socialite_enable[] = link_to_route('frontend.auth.social.login', trans('labels.frontend.auth.login_with', ['social_media' => 'Facebook']), 'facebook');
		}

		if (strlen(getenv('GOOGLE_CLIENT_ID'))) {
			$socialite_enable[] = link_to_route('frontend.auth.social.login', trans('labels.frontend.auth.login_with', ['social_media' => 'Google']), 'google');
		}

		if (strlen(getenv('GITHUB_CLIENT_ID'))) {
			$socialite_enable[] = link_to_route('frontend.auth.social.login', trans('labels.frontend.auth.login_with', ['social_media' => 'Github']), 'github');
		}

		if (strlen(getenv('LINKEDIN_CLIENT_ID'))) {
			$socialite_enable[] = link_to_route('frontend.auth.social.login', trans('labels.frontend.auth.login_with', ['social_media' => 'Linked In']), 'linkedin');
		}

		if (strlen(getenv('TWITTER_CLIENT_ID'))) {
			$socialite_enable[] = link_to_route('frontend.auth.social.login', trans('labels.frontend.auth.login_with', ['social_media' => 'Twitter']), 'twitter');
		}

		for ($i = 0; $i < count($socialite_enable); $i++) {
			$socialite_links .= ($socialite_links != '' ? '&nbsp;|&nbsp;' : '') . $socialite_enable[$i];
		}

		return $socialite_links;
	}

	/**
	 * List of the accepted third party provider types to login with
	 *
	 * @return array
	 */
	public function getAcceptedProviders() {
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