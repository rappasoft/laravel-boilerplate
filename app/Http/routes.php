<?php

/**
 * Switch between the included languages
 */
require(__DIR__ . "/Routes/Global/Lang.php");

/**
 * Frontend Routes
 * Namespaces indicate folder structure
 */
$router->group(['namespace' => 'Frontend'], function () use ($router)
{
	require(__DIR__ . "/Routes/Frontend/Frontend.php");
	require(__DIR__ . "/Routes/Frontend/Access.php");
});

/**
 * Backend Routes
 * Namespaces indicate folder structure
 */
$router->group(['namespace' => 'Backend'], function () use ($router)
{
	$router->group(['prefix' => 'admin', 'middleware' => 'auth'], function () use ($router)
	{
		/**
		 * These routes need the Administrator Role
		 * or the view-backend permission (good if you want to allow more than one group in the backend, then limit the backend features by different roles or permissions)
		 *
		 * If you wanted to do this in the controller it would be:
		 * $this->middleware('access.routeNeedsRoleOrPermission:{role:Administrator,permission:view_backend,redirect:/,with:flash_danger|You do not have access to do that.}');
		 *
		 * You could also do the above in the Route::group below and remove the other parameters, but I think this is easier to read here.
		 * Note: If you have both, the controller will take precedence.
		 */
		$router->group([
			'middleware' => 'access.routeNeedsRoleOrPermission',
			'role'       => ['Administrator'],
			'permission' => ['view_backend'],
			'redirect'   => '/',
			'with'       => ['flash_danger', 'You do not have access to do that.']
		], function () use ($router)
		{
			require(__DIR__ . "/Routes/Backend/Dashboard.php");
			require(__DIR__ . "/Routes/Backend/Access.php");
		});
	});
});