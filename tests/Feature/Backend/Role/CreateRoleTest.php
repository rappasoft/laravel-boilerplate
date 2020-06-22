<?php

namespace Tests\Feature\Backend\Role;

use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class CreateRoleTest.
 */
class CreateRoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_create_role_page()
    {
        $this->withoutMiddleware(RequirePassword::class);

        $this->loginAsAdmin();

        $this->get('/admin/auth/role/create')->assertOk();
    }

    /** @test */
    public function the_name_is_required()
    {
        $this->withoutMiddleware(RequirePassword::class);

        $this->loginAsAdmin();

        $response = $this->post('/admin/auth/role');

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function the_name_must_be_unique()
    {
        $this->withoutMiddleware(RequirePassword::class);

        $this->loginAsAdmin();

        $response = $this->post('/admin/auth/role', ['name' => config('boilerplate.access.role.admin')]);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_role_can_be_created()
    {
        $this->withoutMiddleware(RequirePassword::class);

        $this->loginAsAdmin();

        $this->post('/admin/auth/role', [
            'name' => 'new role',
            'permissions' => [
                Permission::whereName('view backend')->first()->id,
            ],
        ]);

        $this->assertDatabaseHas('roles', [
            'name' => 'new role',
        ]);

        $this->assertDatabaseHas('role_has_permissions', [
            'permission_id' => Permission::whereName('view backend')->first()->id,
            'role_id' => Role::whereName('new role')->first()->id,
        ]);
    }

    /** @test */
    public function only_admin_can_create_roles()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/admin/auth/role/create');

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }
}
