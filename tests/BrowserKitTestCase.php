<?php

namespace Tests;

use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

/**
 * Class TestCase.
 */
abstract class BrowserKitTestCase extends BaseTestCase
{
    use CreatesApplication;

    public $baseUrl = 'http://localhost';
}
