<?php

namespace Tests\Feature\Backend\User;

use App\Domains\Auth\Models\User;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class UpdateUserTest
 *
 * @package Tests\Feature\Backend\User
 */
class UpdateUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_edit_user_page()
    {
        $this->withoutMiddleware(RequirePassword::class);

        $this->loginAsAdmin();

        $user = factory(User::class)->create();

        $response = $this->get('/admin/auth/user/'.$user->id.'/edit');

        $response->assertOk();
    }

    /** @test */
    public function a_user_can_be_updated()
    {
        $this->withoutMiddleware(RequirePassword::class);
    }

    /** @test */
    public function only_the_master_admin_can_update_themselves()
    {
        $this->withoutMiddleware(RequirePassword::class);
    }

    /** @test */
    public function the_master_admins_abilities_can_not_be_modified()
    {
        $this->withoutMiddleware(RequirePassword::class);
    }

    /** @test */
    public function only_admin_can_update_roles()
    {
        $this->actingAs(factory(User::class)->create());

        $user = factory(User::class)->create(['name' => 'John Doe']);

        $response = $this->patch("/admin/auth/user/{$user->id}", [
            'name' => 'Jane Doe',
        ]);

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'John Doe',
        ]);
    }
}
