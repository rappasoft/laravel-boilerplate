<?php

namespace Tests\Feature\Backend\User;

use App\Domains\Auth\Models\User;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class DeleteUserTest.
 */
class DeleteUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_deleted_users_page()
    {
        $this->withoutMiddleware(RequirePassword::class);

        $this->loginAsAdmin();

        $response = $this->get('/admin/auth/user/deleted');

        $response->assertOk();
    }

    /** @test */
    public function only_admin_can_access_deleted_users()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/admin/auth/user/deleted');

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }
}
