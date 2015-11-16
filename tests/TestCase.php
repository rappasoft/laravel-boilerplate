<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {
	/**
	 * The base URL to use while testing the application.
	 *
	 * @var string
	 */
	protected $baseUrl = "http://lrwl-boiler.dev"; //todo: load from env file

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication() {
		$app = require __DIR__ . '/../bootstrap/app.php';

		$app->make( Illuminate\Contracts\Console\Kernel::class )->bootstrap();

		return $app;
	}
}