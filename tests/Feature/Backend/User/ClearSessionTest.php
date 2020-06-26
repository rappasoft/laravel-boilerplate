<?php

namespace Tests\Feature\Backend\User;

use App\Domains\Auth\Models\User;
use Illuminate\Auth\Middleware\RequirePassword;
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
        $this->withoutMiddleware(RequirePassword::class);

        $this->actingAs($user = factory(User::class)->create());

        $user->syncPermissions(['view backend', 'access.user.clear-session']);

        $newUser = factory(User::class)->create();

        $response = $this->post('/admin/auth/user/'.$newUser->id.'/clear-session');

        $response->assertSessionHas('flash_success', __('The user\'s session was successfully cleared.'));

        $user->syncPermissions(['view backend']);

        $response = $this->post('/admin/auth/user/'.$newUser->id.'/clear-session');

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }
}
