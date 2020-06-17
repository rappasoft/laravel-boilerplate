<?php

namespace Tests\Feature\Frontend;

use App\Domains\Auth\Models\User;
use Tests\TestCase;

/**
 * Class LogoutTest.
 */
class LogoutTest extends TestCase
{
    /** @test */
    public function the_user_can_logout()
    {
        $this->actingAs($user = factory(User::class)->create());

        $this->assertAuthenticatedAs($user);

        $this->post('/logout')->assertRedirect('/');

        $this->assertFalse($this->isAuthenticated());
    }
}
