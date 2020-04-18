<?php

namespace Tests\Feature\Backend\User;

use App\Events\Backend\Auth\User\UserConfirmed;
use App\Events\Backend\Auth\User\UserUnconfirmed;
use App\Models\Auth\User;
use App\Notifications\Backend\Auth\UserAccountActive;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class ConfirmUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_confirm_a_user()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->states('unconfirmed')->create();

        Event::fake();

        $response = $this->get("/admin/auth/user/{$user->id}/confirm");

        $this->assertSame(true, $user->fresh()->confirmed);
        Event::assertDispatched(UserConfirmed::class);

        $response->assertSessionHas(['flash_success' => __('alerts.backend.users.confirmed')]);
    }

    /** @test */
    public function an_admin_cannot_confirm_a_confirmed_user()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->states('confirmed')->create();

        $response = $this->get("/admin/auth/user/{$user->id}/confirm");
        $response->assertSessionHas(['flash_danger' => __('exceptions.backend.access.users.already_confirmed')]);
    }

    /** @test */
    public function a_newly_confirmed_user_gets_notified_when_approved()
    {
        config(['access.users.requires_approval' => true]);

        $this->loginAsAdmin();
        $user = factory(User::class)->states('unconfirmed')->create();

        Notification::fake();

        $this->get("/admin/auth/user/{$user->id}/confirm");

        Notification::assertSentTo($user, UserAccountActive::class);
    }

    /** @test */
    public function an_admin_can_unconfirm_a_user()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->states('confirmed')->create();

        Event::fake();

        $response = $this->get("/admin/auth/user/{$user->id}/unconfirm");

        $this->assertSame(false, $user->fresh()->confirmed);
        Event::assertDispatched(UserUnconfirmed::class);

        $response->assertSessionHas(['flash_success' => __('alerts.backend.users.unconfirmed')]);
    }

    /** @test */
    public function an_admin_cannot_unconfirm_an_unconfirmed_user()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->states('unconfirmed')->create();

        $response = $this->get("/admin/auth/user/{$user->id}/unconfirm");
        $response->assertSessionHas(['flash_danger' => __('exceptions.backend.access.users.not_confirmed')]);
    }

    /** @test */
    public function an_admin_cannot_be_unconfirmed()
    {
        $admin = $this->loginAsAdmin();
        $second_admin = $this->createAdmin();
        $this->actingAs($second_admin);

        $response = $this->get("/admin/auth/user/{$admin->id}/unconfirm");
        $response->assertSessionHas(['flash_danger' => __('exceptions.backend.access.users.cant_unconfirm_admin')]);
    }

    /** @test */
    public function a_user_cannot_unconfirm_self()
    {
        $this->loginAsAdmin();

        $second_admin = $this->createAdmin();
        $this->actingAs($second_admin);

        $response = $this->get("/admin/auth/user/{$second_admin->id}/unconfirm");
        $response->assertSessionHas(['flash_danger' => __('exceptions.backend.access.users.cant_unconfirm_self')]);
    }

    /** @test */
    public function an_admin_can_confirm_a_deleted_user()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->states(['unconfirmed', 'softDeleted'])->create();

        $this->get("/admin/auth/user/{$user->id}/confirm");

        $this->assertSame(true, $user->fresh()->confirmed);
    }

    /** @test */
    public function an_admin_can_unconfirm_a_deleted_user()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->states(['confirmed', 'softDeleted'])->create();

        $this->get("/admin/auth/user/{$user->id}/unconfirm");

        $this->assertSame(false, $user->fresh()->confirmed);
    }
}
