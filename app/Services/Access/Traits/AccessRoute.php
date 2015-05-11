<?php namespace App\Services\Access\Traits;

/**
 * Class AccessRoute
 * @package App\Services\Access\Traits
 */
trait AccessRoute {

	/**
	 * Get route group assets
	 * @param $request
	 * @return array
	 */
	public function getAssets($request) {
		$assets = [];
		$assets['roles'] = $this->getRoles($request);
		$assets['permissions'] = $this->getPermissions($request);
		$assets['needsAll'] = $this->getNeedsAll($request);
		return $assets;
	}

	/**
	 * Get the roles from the route request array
	 * @param $request
	 * @return array
	 */
	public function getRoles($request) {
		$roles = [];
		$route   = $request->route();
		$actions = $route->getAction();

		//Role isnt needed for this request
		if (! isset($actions['role'])) return false;

		if (is_array($actions['role']))
		{
			return array_merge($roles, $actions['role']);
		}

		$roles[] = $actions['role'];

		return $roles;
	}

	/**
	 * Get the permissions from the route request array
	 * @param $request
	 * @return array
	 */
	public function getPermissions($request) {
		$permissions = [];
		$route   = $request->route();
		$actions = $route->getAction();

		//Permission isnt needed for this request
		if (! isset($actions['permission'])) return false;

		if (is_array($actions['permission']))
		{
			return array_merge($permissions, $actions['permission']);
		}

		$permissions[] = $actions['permission'];

		return $permissions;
	}

	/**
	 * Get the needsAll flag from the route request array
	 * @param $request
	 * @return bool
	 */
	public function getNeedsAll($request) {
		$route   = $request->route();
		$actions = $route->getAction();
		return isset($actions['needsAll']) ? $actions['needsAll'] : false;
	}

	/**
	 * Get the normal redirect method, url
	 * @param $request
	 * @return bool
	 */
	public function getRedirect($request) {
		$route   = $request->route();
		$actions = $route->getAction();
		return isset($actions['redirect']) ? $actions['redirect'] : false;
	}

	/**
	 * Get route to redirect to
	 * @param $request
	 * @return bool
	 */
	public function getRedirectRoute($request) {
		$route   = $request->route();
		$actions = $route->getAction();
		return isset($actions['redirectRoute']) ? $actions['redirectRoute'] : false;
	}

	/**
	 * Get action to redirect to
	 * @param $request
	 * @return bool
	 */
	public function getRedirectAction($request) {
		$route   = $request->route();
		$actions = $route->getAction();
		return isset($actions['redirectAction']) ? $actions['redirectAction'] : false;
	}

	/**
	 * Figure out what redirect method is wanted and do it
	 * @param $request
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Symfony\Component\HttpFoundation\Response
	 */
	public function getRedirectMethodAndGo($request) {
		$redirection = false;

		//Check for the type of redirect
		if ($redirect = $this->getRedirect($request)) {
			$redirection = redirect($redirect);
		} else if ($route = $this->getRedirectRoute($request)) {
			$redirection = redirect()->route($route);
		} else if ($action = $this->getRedirectAction($request)) {
			$redirection = redirect()->action($action);
		}

		//Check to see if a flash message is being sent through
		if ($redirection)
		{
			if ($with = $this->getSessionMessage($request))
				return $redirection->with($with['key'], $with['message']);
			else
				return $redirection;
		}

		//No redirect of any type given
		return response('Unauthorized', 401);
	}

	/**
	 * Flash message key and value
	 * @param $request
	 * @return array|bool
	 */
	public function getSessionMessage($request) {
		$route   = $request->route();
		$actions = $route->getAction();

		if (! isset($actions['with'])) return false;

		if (is_array($actions['with'])) {
			return ['key' => $actions['with'][0], 'message' => $actions['with'][1]];
		}

		return false;
	}
}