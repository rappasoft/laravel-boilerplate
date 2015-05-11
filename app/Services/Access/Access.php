<?php namespace App\Services\Access;

class Access
{
	/**
	 * Laravel application
	 *
	 * @var \Illuminate\Foundation\Application
	 */
	public $app;

	/**
	 * Create a new confide instance.
	 *
	 * @param \Illuminate\Foundation\Application $app
	 */
	public function __construct($app)
	{
		$this->app = $app;
	}

	/**
	 * Get the currently authenticated user or null.
	 */
	public function user()
	{
		return auth()->user();
	}

	/**
	 * @return mixed
	 * Get the currently authenticated user's id
	 */
	public function id()
	{
		return auth()->id();
	}

	/**
	 * Checks if the current user has a Role by its name
	 *
	 * @param string $role Role name.
	 *
	 * @return bool
	 */
	public function hasRole($role)
	{
		if ($user = $this->user()) {
			return $user->hasRole($role);
		}

		return false;
	}

	/**
	 * Checks if the user has either one or more, or all of an array of roles
	 * @param $roles
	 * @param bool $needsAll
	 * @return bool
	 */
	public function hasRoles($roles, $needsAll = false)
	{
		if ($user = $this->user()) {
			//If not an array, make a one item array
			if (!is_array($roles))
			{
				$roles = array($roles);
			}

			return $user->hasRoles($roles, $needsAll);
		}

		return false;
	}

	/**
	 * Check if the current user has a permission by its name
	 *
	 * @param string $permission Permission string.
	 *
	 * @return bool
	 */
	public function can($permission)
	{
		if ($user = $this->user()) {
			return $user->can($permission);
		}

		return false;
	}

	/**
	 * Check an array of permissions and whether or not all are required to continue
	 * @param $permissions
	 * @param $needsAll
	 * @return bool
	 */
	public function canMultiple($permissions, $needsAll) {
		if ($user = $this->user()) {
			//If not an array, make a one item array
			if (!is_array($permissions))
			{
				$permissions = array($permissions);
			}

			return $user->canMultiple($permissions, $needsAll);
		}

		return false;
	}
}
