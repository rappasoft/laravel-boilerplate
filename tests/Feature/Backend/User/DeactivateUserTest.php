<?php

namespace Tests\Backend\User;

use App\Events\Backend\Auth\User\UserDeactivated;
use App\Events\Backend\Auth\User\UserReactivated;
use App\Models\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class DeactivateUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_deactivated_users_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/auth/user/deactivated');

        $response->assertStatus(200);
    }

    /** @test */
    public function an_admin_can_deactivate_users()
    {
        $user = factory(User::class)->create();
        $this->loginAsAdmin();
        Event::fake();

        $this->get("/admin/auth/user/{$user->id}/mark/0");

        $this->assertSame(false, $user->fresh()->active);
        Event::assertDispatched(UserDeactivated::class);
    }

    /** @test */
    public function an_admin_can_reactivate_users()
    {
        $user = factory(User::class)->states('inactive')->create();
        $this->loginAsAdmin();
        Event::fake();

        $this->get("/admin/auth/user/{$user->id}/mark/1");

        $this->assertSame(true, $user->fresh()->active);
        Event::assertDispatched(UserReactivated::class);
    }

    /** @test */
    public function an_admin_cant_deactivate_himself()
    {
        $admin = $this->loginAsAdmin();

        $response = $this
            ->from('admin/auth/user')
            ->get("/admin/auth/user/{$admin->id}/mark/0");

        $response->assertSessionHas(['flash_danger' => __('exceptions.backend.access.users.cant_deactivate_self')]);
    }
}
