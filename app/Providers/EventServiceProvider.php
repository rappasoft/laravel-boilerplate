<?php namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		/**
		 * Frontend Events
		 */
		'App\Events\Frontend\Auth\UserLoggedIn' => [
			'App\Handlers\Events\Frontend\Auth\UserLoggedInHandler',
		],
		'App\Events\Frontend\Auth\UserLoggedOut' => [
			'App\Handlers\Events\Frontend\Auth\UserLoggedOutHandler',
		],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		//
	}
}