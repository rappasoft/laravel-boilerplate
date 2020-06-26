<?php

namespace Tests\Feature\Frontend;

use App\Domains\Auth\Models\User;
use Tests\TestCase;

/**
 * Class ConfirmationTest.
 */
class ConfirmationTest extends TestCase
{
    /** @test */
    public function a_user_can_access_the_confirm_password_page()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $this->get('/password/confirm')->assertOk();
    }
}
