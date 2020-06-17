<?php

namespace Tests\Feature\Frontend;

use App\Domains\Auth\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

/**
 * Class ChangePasswordTest
 *
 * @package Tests\Feature\Frontend
 */
class ChangePasswordTest extends TestCase
{

    /** @test */
    public function validation_is_required()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->patch('/password/update');

        $response->assertSessionHasErrors(['current_password', 'password']);
    }

    /** @test */
    public function a_user_can_change_their_password()
    {
        $user = factory(User::class)->create(['password' => '1234']);

        $response = $this->actingAs($user)
            ->patch('/password/update', [
                'current_password' => '1234',
                'password' => 'OC4Nzu270N!QBVi%U%qX',
                'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX',
            ])->assertRedirect('/account?#password');

        $response->assertSessionHas('flash_success', __('Password successfully updated.'));
        $this->assertTrue(Hash::check('OC4Nzu270N!QBVi%U%qX', $user->fresh()->password));
    }
}
