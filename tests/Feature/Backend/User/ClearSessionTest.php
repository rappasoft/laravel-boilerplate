<?php

namespace Tests\Feature\Backend\User;

use App\Domains\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class ClearSessionTest.
 */
class ClearSessionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_a_user_with_correct_permissions_can_clear_user_sessions()
    {
        $this->actingAs($user = factory(User::class)->state('admin')->create());

        $user->syncPermissions(['admin.access.user.clear-session']);

        $newUser = factory(User::class)->create();

        $response = $this->post('/admin/auth/user/'.$newUser->id.'/clear-session');

        $response->assertSessionHas('flash_success', __('The user\'s session was successfully cleared.'));

        $user->syncPermissions([]);

        $response = $this->post('/admin/auth/user/'.$newUser->id.'/clear-session');

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

    /** @test */
    public function a_user_can_not_clear_their_own_session()
    {
        $this->actingAs($user = factory(User::class)->state('admin')->create());

        $user->syncPermissions(['admin.access.user.clear-session']);

        $response = $this->post('/admin/auth/user/'.$user->id.'/clear-session');

        $response->assertSessionHas('flash_danger', __('You can not clear your own session.'));
    }
}
