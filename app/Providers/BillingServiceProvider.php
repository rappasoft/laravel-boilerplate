<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class BillingServiceProvider
 * @package App\Providers
 */
class BillingServiceProvider extends ServiceProvider {

	/**
	 *
	 */
	public function boot()
	{
		//
	}

	/**
	 *
	 */
	public function register()
	{
		$this->app->bind(
			'App\Services\Billing\BillingContract',
			'App\Services\Billing\StripeGateway'
		);
	}
}