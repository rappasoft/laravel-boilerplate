<?php

namespace Tests\Feature\Backend\User;

use App\Domains\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class ListUserTest.
 */
class ListUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_a_user_with_correct_permissions_can_list_users()
    {
        $this->actingAs($user = factory(User::class)->state('admin')->create());

        $user->syncPermissions(['admin.access.user.list']);

        $this->get('/admin/auth/user')->assertOk();

        $user->syncPermissions([]);

        $response = $this->get('/admin/auth/user');

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

    /** @test */
    public function only_a_user_with_correct_permissions_can_view_an_individual_user()
    {
        $this->actingAs($user = factory(User::class)->state('admin')->create());

        $user->syncPermissions(['admin.access.user.list']);

        $newUser = factory(User::class)->create();

        $this->get('/admin/auth/user/'.$newUser->id)->assertOk();

        $user->syncPermissions([]);

        $response = $this->get('/admin/auth/user/'.$newUser->id);

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }
}
