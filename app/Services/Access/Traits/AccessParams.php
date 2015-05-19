<?php namespace App\Services\Access\Traits;

/**
 * Class AccessParams
 * @package App\Services\Access\Traits
 */
trait AccessParams {

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
			$this->getParamFromController($params, "needsAll")[0] == "true" ? true : false :
			$this->getParamFromRoute($request, "needsAll")[0];
	}

	/**
	 * @param $request
	 * @param $params
	 * @return mixed
	 */
	private function getRedirect($request, $params) {
		return !is_null($params) ?
			$this->getParamFromController($params, "redirect")[0] :
			$this->getParamFromRoute($request, "redirect")[0];
	}

	/**
	 * @param $request
	 * @param $params
	 * @return mixed
	 */
	private function getRedirectRoute($request, $params) {
		return !is_null($params) ?
			$this->getParamFromController($params, "redirectRoute")[0] :
			$this->getParamFromRoute($request, "redirectRoute")[0];
	}

	/**
	 * @param $request
	 * @param $params
	 * @return mixed
	 */
	private function getRedirectAction($request, $params) {
		return !is_null($params) ?
			$this->getParamFromController($params, "redirectAction")[0] :
			$this->getParamFromRoute($request, "redirectAction")[0];
	}

	/**
	 * @param $request
	 * @param $params
	 * @return array|bool
	 */
	private function getSessionMessage($request, $params) {
		return !is_null($params) ? $this->getParamFromController($params, "with") : $this->getParamFromRoute($request, "with");
	}

	/**
	 * @param $request
	 * @param $params
	 * @return bool|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Symfony\Component\HttpFoundation\Response
	 */
	private function getRedirectMethodAndGo($request, $params) {
		$redirection = false;

		//Check for the type of redirect
		if ($redirect = $this->getRedirect($request, $params))
			$redirection = redirect($redirect);
		else if ($route = $this->getRedirectRoute($request, $params))
			$redirection = redirect()->route($route);
		else if ($action = $this->getRedirectAction($request, $params))
			$redirection = redirect()->action($action);

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
	 * @param $params
	 * @param $name
	 * @return array|bool
	 */
	private function getParamByName($params, $name) {
		$params = ltrim($params, "{");
		$params = rtrim($params, "}");
		$params = explode("::", $params);
		$pairs = [];
		foreach ($params as $param) {
			$param = explode(":", $param);
			$pairs[$param[0]] = $param[1];
		}

		foreach ($pairs as $type => $value) {
			if ($type == $name) {
				if ($name == "with") {
					if (strpos($value, "|") !== false) {
						$with = explode("|", $value);
						if (count($with) != 2) return false;
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

	/**
	 * @param $request
	 * @param $param
	 * @return array
	 */
	private function getParamFromRoute($request, $param) {
		$return = [];

		$route = $request->route();
		$actions = $route->getAction();

		//Param isn't needed for this request
		if (! isset($actions[$param])) return false;

		//Flash session message
		if ($param == "with")
			if (is_array($actions[$param]) && count($actions[$param]) == 2)
				return ['key' => $actions[$param][0], 'message' => $actions[$param][1]];

		if (is_array($actions[$param]))
			return array_merge($return, $actions[$param]);

		$return[] = $actions[$param];

		return $return;
	}

	/**
	 * @param $params
	 * @param $param
	 * @return array|bool
	 */
	private function getParamFromController($params, $param) {
		$return = [];
		$param = $this->getParamByName($params, $param);

		//Param isn't needed for this request
		if (! $param) return false;

		//Already formatted as needed
		if ($param == "with") return $param;

		if (is_array($param))
			return array_merge($return, $param);

		$return[] = $param;
		return $return;
	}
}