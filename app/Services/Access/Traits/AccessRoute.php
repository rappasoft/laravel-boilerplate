<?php namespace App\Services\Access\Traits;

/**
 * Class AccessRoute
 * @package App\Services\Access\Traits
 */
trait AccessRoute {

	/**
	 * @param $request
	 * @param $params
	 * @return mixed
	 *
	 * Returns assets array needed by middleware to complete request
	 * You can append your own if needed
	 */
	public function getAssets($request, $params) {
		$assets['roles'] = $this->getRoles($request, $params);
		$assets['permissions'] = $this->getPermissions($request, $params);
		$assets['needsAll'] = $this->getNeedsAll($request, $params);
		return $assets;
	}

	/**
	 * @param $request
	 * @param $params
	 * @return array|bool
	 */
	private function getRoles($request, $params) {
		return !is_null($params) ? $this->getParamFromController($params, "role") : $this->getParamFromRoute($request, "role");
	}

	/**
	 * @param $request
	 * @param $params
	 * @return array|bool
	 */
	private function getPermissions($request, $params) {
		return !is_null($params) ? $this->getParamFromController($params, "permission") : $this->getParamFromRoute($request, "permission");
	}

	/**
	 * @param $request
	 * @param $params
	 * @return mixed
	 */
	private function getNeedsAll($request, $params) {
		return !is_null($params) ?
			$this->getParamFromController($params, "needsAll") :
			(bool)$this->getParamFromRoute($request, "needsAll")[0];
	}







	/**
	 * Get the normal redirect method, url
	 * @param $request
	 * @return bool
	 */
	private function getRedirect($request) {
		$route   = $request->route();
		$actions = $route->getAction();
		return isset($actions['redirect']) ? $actions['redirect'] : false;
	}

	/**
	 * Get route to redirect to
	 * @param $request
	 * @return bool
	 */
	private function getRedirectRoute($request) {
		$route   = $request->route();
		$actions = $route->getAction();
		return isset($actions['redirectRoute']) ? $actions['redirectRoute'] : false;
	}

	/**
	 * Get action to redirect to
	 * @param $request
	 * @return bool
	 */
	private function getRedirectAction($request) {
		$route   = $request->route();
		$actions = $route->getAction();
		return isset($actions['redirectAction']) ? $actions['redirectAction'] : false;
	}

	/**
	 * Figure out what redirect method is wanted and do it
	 * @param $request
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Symfony\Component\HttpFoundation\Response
	 */
	private function getRedirectMethodAndGo($request, $params) {
		$redirection = false;

		//Check for the type of redirect
		if ($redirect = $this->getRedirect($request, $params)) {
			$redirection = redirect($redirect);
		} else if ($route = $this->getRedirectRoute($request, $params)) {
			$redirection = redirect()->route($route);
		} else if ($action = $this->getRedirectAction($request, $params)) {
			$redirection = redirect()->action($action);
		}

		//Check to see if a flash message is being sent through
		if ($redirection)
		{
			if ($with = $this->getSessionMessage($request, $params))
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
	private function getSessionMessage($request, $params) {
		$route   = $request->route();
		$actions = $route->getAction();

		if (! isset($actions['with'])) return false;

		if (is_array($actions['with'])) {
			return ['key' => $actions['with'][0], 'message' => $actions['with'][1]];
		}

		return false;
	}

	private function getParamByName($params, $name) {
		$params = ltrim($params, "{");
		$params = rtrim($params, "}");
		$params = explode("::", $params);
		$pairs = [];
		foreach ($params as $param) {
			$param = explode(":", $param);
			$pairs[$param[0]] = $param[1];
		}

		dd($pairs);

		foreach ($pairs as $type => $value) {
			$type = strtolower($type);

			if ($type == $name) {
				if ($name == "with") {
					if (strpos($value, "|") !== false) {
						$with = explode("|", $value);
						if (count($with) != 1) return false;
						return ['key' => $with[0], 'message' => $with[1]];
					} else return false;
				}

				if (strpos($value, "|") !== false)
					return explode("|", $value);
				else
					return $value;
			}
		}

		return false;
	}

	private function getParamFromRoute($request, $param) {
		$return = [];

		$route = $request->route();
		$actions = $route->getAction();

		//Role isn't needed for this request
		if (! isset($actions[$param])) return false;

		if (is_array($actions[$param]))
			return array_merge($return, $actions[$param]);

		$return[] = $actions[$param];

		return $return;
	}

	private function getParamFromController($params, $param) {
		$return = [];
		$param = $this->getParamByName($params, $param);

		if ($param == "needsAll") dd($param);

		//Role isn't needed for this request
		if (! $param) return false;

		if (is_array($param))
			return array_merge($return, $param);

		$return[] = $param;

		return $return;
	}
}