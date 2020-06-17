<?php

namespace Tests\Feature\Frontend;

use App\Domains\Auth\Models\User;
use Tests\TestCase;

/**
 * Class VerificationTest.
 */
class VerificationTest extends TestCase
{
    /** @test */
    public function an_unverified_user_cannot_access_dashboard()
    {
        $user = factory(User::class)->states('unconfirmed')->create();

        $this->actingAs($user);

        $this->get('/dashboard')
            ->assertRedirect('/email/verify');
    }

    /** @test */
    public function an_unverified_user_cannot_access_account()
    {
        $user = factory(User::class)->states('unconfirmed')->create();

        $this->actingAs($user);

        $this->get('/account')
            ->assertRedirect('/email/verify');
    }
}
