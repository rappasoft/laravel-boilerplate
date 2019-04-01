<?php

namespace Tests\Backend\User;

use Tests\TestCase;
use App\Models\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageUserSocialTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_remove_user_social_account_from_a_user()
    {
        $this->loginAsAdmin();

        $user = factory(User::class)->create();
        $provider = $user->providers()->create([
            'provider' => 'github',
            'provider_id' => mt_rand(),
            'token' => mt_rand(),
            'avatar' => null,
        ]);

        $this->assertSame(1, $user->fresh()->providers()->count());
        $response = $this->delete("/admin/auth/user/{$user->id}/social/{$provider->id}/unlink");
        $this->assertSame(0, $user->fresh()->providers()->count());
        $response->assertSessionHas(['flash_success' => __('alerts.backend.users.social_deleted')]);
    }

    /** @test */
    public function an_admin_can_remove_user_social_account_from_a_deleted_user()
    {
        $this->loginAsAdmin();

        $user = factory(User::class)->states('softDeleted')->create();
        $provider = $user->providers()->create([
            'provider' => 'github',
            'provider_id' => mt_rand(),
            'token' => mt_rand(),
            'avatar' => null,
        ]);

        $this->assertSame(1, $user->fresh()->providers()->count());
        $response = $this->delete("/admin/auth/user/{$user->id}/social/{$provider->id}/unlink");
        $this->assertSame(0, $user->fresh()->providers()->count());
        $response->assertSessionHas(['flash_success' => __('alerts.backend.users.social_deleted')]);
    }
}
