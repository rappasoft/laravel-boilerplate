<?php

/*
 * Global helpers file with misc functions
 */

if (! function_exists('app_name')) {
	/**
	 * Helper to grab the application name
	 *
	 * @return mixed
	 */
	function app_name() {
		return \Config::get('app.name');
	}
}