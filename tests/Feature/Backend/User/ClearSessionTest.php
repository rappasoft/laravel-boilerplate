<?php

namespace Tests\Backend\User;

use Tests\TestCase;
use App\Models\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class ClearSessionTest.
 */
class ClearSessionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_clear_a_user_session()
    {
        $this->loginAsAdmin();

        $user = factory(User::class)->create();

        $this->assertDatabaseHas('users', ['id' => $user->getKey(), 'to_be_logged_out' => false]);

        $response = $this->get("/admin/auth/user/{$user->id}/clear-session");

        $response->assertSessionHas(['flash_success' => __('alerts.backend.users.session_cleared')]);

        $this->assertDatabaseHas('users', ['id' => $user->getKey(), 'to_be_logged_out' => true]);
    }
}
