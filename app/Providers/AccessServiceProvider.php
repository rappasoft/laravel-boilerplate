<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Access\Access;
use App\Blade\Access\AccessBladeExtender;
use App\Observers\UserObserver;

/**
 * Class VaultServiceProvider
 * @package Rappasoft\Vault
 */
class AccessServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Package boot method
	 */
	public function boot() {
		$this->registerObservers();
		$this->registerBladeExtender();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerAccess();
		$this->registerFacade();
		$this->registerBindings();
	}

	/**
	 * Register the application bindings.
	 *
	 * @return void
	 */
	private function registerAccess()
	{
		$this->app->bind('access', function($app) {
			return new Access($app);
		});
	}

	/**
	 * Register the vault facade without the user having to add it to the app.php file.
	 *
	 * @return void
	 */
	public function registerFacade() {
		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Access', 'App\Services\Access\Facades\Access');
		});
	}

	/**
	 * Register service provider bindings
	 */
	public function registerBindings() {
		$this->app->bind(
			'App\Repositories\Role\RoleRepositoryContract',
			'App\Repositories\Role\EloquentRoleRepository'
		);

		$this->app->bind(
			'App\Repositories\Permission\PermissionRepositoryContract',
			'App\Repositories\Permission\EloquentPermissionRepository'
		);
	}

	/**
	 * Register any model observers
	 */
	public function registerObservers() {
		$user = $this->app['config']['auth.model'];
		$user = new $user;
		$user->observe(new UserObserver);
	}

	/**
	 * Get the services provided.
	 *
	 * @return string[]
	 */
	public function provides()
	{
		return array(
			'access',
		);
	}

	/**
	 * Register the blade extender to use new blade sections
	 */
	protected function registerBladeExtender() {
		AccessBladeExtender::attach($this->app);
	}
}