<?php

namespace Tests\Feature\Backend\Role;

use App\Domains\Auth\Models\User;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class ReadRolesTest.
 */
class ListRoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_role_index_page()
    {
        $this->withoutMiddleware(RequirePassword::class);

        $this->loginAsAdmin();

        $this->get('/admin/auth/role')->assertOk();
    }

    /** @test */
    public function only_admin_can_view_roles()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/admin/auth/role');

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }
}
