<?php

namespace Tests\Feature\Backend\User;

use App\Domains\Auth\Models\User;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class ReadUsersTest.
 */
class ReadUsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_user_index_page()
    {
        $this->withoutMiddleware(RequirePassword::class);

        $this->loginAsAdmin();

        $this->get('/admin/auth/user')->assertOk();
    }

    /** @test */
    public function only_admin_can_view_users()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/admin/auth/user');

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }
}
