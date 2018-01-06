<?php

namespace Tests;


use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\TestResponse;

/**
 * Class TestCase.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp()
    {
        parent::setUp();

        $test = $this;

        TestResponse::macro('followRedirects', function ($testCase = null) use ($test) {
            $response = $this;
            $testCase = $testCase ?: $test;

            while ($response->isRedirect()) {
                $response = $testCase->get($response->headers->get('Location'));
            }

            return $response;
        });
    }
}
