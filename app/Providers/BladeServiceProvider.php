<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

/**
 * Class BladeServiceProvider
 * @package App\Providers
 */
class BladeServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register any misc. blade extensions
	 */
	public function register() {
		/**
		 * The block of code inside this directive indicates
		 * the chosen language requests RTL support.
		 */
		Blade::directive('langRTL', function () {
			return "<?php if (session()->has('lang-rtl')): ?>";
		});

		/**
		 * Sets a PHP variable in a blade view
		 * Courtesy of https://github.com/sineld/bladeset
		 */
		Blade::extend(function ($value) {
			return preg_replace("/@set\(['\"](.*?)['\"]\,(.*)\)/", '<?php $$1 = $2; ?>', $value);
		});
	}
}