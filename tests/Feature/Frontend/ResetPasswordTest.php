<?php

namespace Tests\Feature\Frontend;

use Tests\TestCase;

/**
 * Class ResetPasswordTest.
 */
class ResetPasswordTest extends TestCase
{
    /** @test */
    public function the_password_reset_route_exists()
    {
        $this->get('password/reset')->assertOk();
    }
}
