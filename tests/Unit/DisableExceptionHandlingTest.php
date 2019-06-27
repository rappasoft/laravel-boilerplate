<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DisableExceptionHandlingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function check_if_disable_exception_handling_works()
    {
        try {
            //With disable exception handling enabled, route does not redirect, instead throws an exception.
            $this->disableExceptionHandling();
            $response = $this->get('admin');
            $response->assertStatus(302);
        } catch (\Exception $ex) {
            $this->assertSame('Unauthenticated.', $ex->getMessage());
        }
    }
}
