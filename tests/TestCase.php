<?php

require_once __DIR__ . '/../bootstrap/autoload.php';

/**
 * Class TestCase
 */
class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl;

    /**
     *
     */
    public function __construct()
    {
        Dotenv::load(__DIR__ . '/..');
        $this->baseUrl = Dotenv::findEnvironmentVariable('APP_URL');
    }

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }
}
