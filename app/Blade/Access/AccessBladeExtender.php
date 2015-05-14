<?php namespace App\Blade\Access;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\View\Compilers\BladeCompiler as Compiler;

/**
 * Class AccessBladeExtender
 * @package App\Blade\Access
 */
class AccessBladeExtender
{
	/**
	 * @param Application $app
	 */
	public static function attach(Application $app)
	{
		$blade = $app['view']->getEngineResolver()->resolve('blade')->getCompiler();
		$class = new static;
		foreach (get_class_methods($class) as $method) {
			if ($method == 'attach') continue;

			$blade->extend(function ($value) use ($app, $class, $blade, $method) {
				return $class->$method($value, $app, $blade);
			});
		}
	}

	/**
	 * @param $value
	 * @param Application $app
	 * @param Compiler $blade
	 * @return mixed
	 */
	public function openRole($value, Application $app, Compiler $blade)
	{
		$matcher = '/@role\([\'"]([\w\d]*)[\'"]\)/';
		return preg_replace($matcher, '<?php if (access()->hasRole(\'$1\')): ?> ', $value);
	}

	/**
	 * @param $value
	 * @param Application $app
	 * @param Compiler $blade
	 * @return mixed
	 */
	public function closeRole($value, Application $app, Compiler $blade)
	{
		$matcher = $blade->createPlainMatcher('endrole');
		return preg_replace($matcher, '<?php endif; ?>', $value);
	}

	/**
	 * @param $value
	 * @param Application $app
	 * @param Compiler $blade
	 * @return mixed
	 */
	public function openPermission($value, Application $app, Compiler $blade)
	{
		$matcher = '/@permission\([\'"]([\w\d]*)[\'"]\)/';
		return preg_replace($matcher, '<?php if (access()->can(\'$1\')): ?> ', $value);
	}

	/**
	 * @param $value
	 * @param Application $app
	 * @param Compiler $blade
	 * @return mixed
	 */
	public function closePermission($value, Application $app, Compiler $blade)
	{
		$matcher = $blade->createPlainMatcher('endpermission');
		return preg_replace($matcher, '<?php endif; ?>', $value);
	}
}