<?php

namespace App\Providers;

use App\Helpers\Macros\Macros;
use Collective\Html\HtmlServiceProvider;

/**
 * Class MacroServiceProvider
 * @package App\Providers
 */
class MacroServiceProvider extends HtmlServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		parent::register();

		$this->app->singleton('form', function ($app) {
			$form = new Macros($app['html'], $app['url'], $app['view'], $app['session.store']->getToken());
			return $form->setSessionStore($app['session.store']);
		});
	}
}