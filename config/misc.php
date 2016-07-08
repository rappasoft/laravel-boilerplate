<?php

return [
	/**
	 * Whether the registration captcha is on or off
	 */
	'captcha' => env('CAPTCHA_STATUS', false),

	/**
	 * In seconds
	 * Default: 10 mins
	 */
	'session_timeout_status' => env('SESSION_TIMEOUT_STATUS', true),
	'session_timeout' => env('SESSION_TIMEOUT', 600)
];