<?php

use App\Models\Access\User\User;

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

	/**
	 * Socialite Credentials
	 * Redirect URL's need to be the same as specified on each network you set up this application on
	 * as well as conform to the route:
	 * http://localhost/public/login/SERVICE
	 * Where service can github, facebook, twitter, google, linkedin, or bitbucket
	 * Docs: https://github.com/laravel/socialite
	 * Make sure 'scopes' and 'with' are arrays, if their are none, use empty arrays []
	 */

	'bitbucket' => [
		'client_id' => env('BITBUCKET_CLIENT_ID'),
		'client_secret' => env('BITBUCKET_CLIENT_SECRET'),
		'redirect' => env('BITBUCKET_REDIRECT'),
		'scopes' => [],
		'with' => [],
	],

	'facebook' => [
		'client_id' => env('FACEBOOK_CLIENT_ID'),
		'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
		'redirect' => env('FACEBOOK_REDIRECT'),
		'scopes' => [],
		'with' => [],
		'fields' => [],
	],

	'github' => [
		'client_id' => env('GITHUB_CLIENT_ID'),
		'client_secret' => env('GITHUB_CLIENT_SECRET'),
		'redirect' => env('GITHUB_REDIRECT'),
		'scopes' => [],
		'with' => [],
	],

	'google' => [
		'client_id' => env('GOOGLE_CLIENT_ID'),
		'client_secret' => env('GOOGLE_CLIENT_SECRET'),
		'redirect' => env('GOOGLE_REDIRECT'),

		/**
		 * Only allows google to grab email address
		 * Default scopes array also has: 'https://www.googleapis.com/auth/plus.login'
		 * https://medium.com/@njovin/fixing-laravel-socialite-s-google-permissions-2b0ef8c18205
		 */
		'scopes' => [
			'https://www.googleapis.com/auth/plus.me',
			'https://www.googleapis.com/auth/plus.profile.emails.read',
		],

		'with' => [],
	],

	'linkedin' => [
		'client_id' => env('LINKEDIN_CLIENT_ID'),
		'client_secret' => env('LINKEDIN_CLIENT_SECRET'),
		'redirect' => env('LINKEDIN_REDIRECT'),
		'scopes' => [],
		'with' => [],
		'fields' => [],
	],

	'twitter' => [
		'client_id' => env('TWITTER_CLIENT_ID'),
		'client_secret' => env('TWITTER_CLIENT_SECRET'),
		'redirect' => env('TWITTER_REDIRECT'),
		'scopes' => [],
		'with' => [],
	],
];