<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->singleton('App\Services\ResponseInterface', function ($app) {
            return new \App\Services\ResponseService;
        });

        if ($this->app->environment() == 'local') {
            $this->app->register('Laralib\L5scaffold\GeneratorsServiceProvider');
        }
	}
}
