<?php namespace App\Providers;

use App\Http\Macros;

/**
 * Class MacroServiceProvider
 * @package App\Providers
 */
class MacroServiceProvider extends \Illuminate\Html\HtmlServiceProvider {

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

		$this->app->bindShared('form', function($app)
		{
			$form = new Macros($app['html'], $app['url'], $app['session.store']->getToken());
			return $form->setSessionStore($app['session.store']);
		});
	}
}