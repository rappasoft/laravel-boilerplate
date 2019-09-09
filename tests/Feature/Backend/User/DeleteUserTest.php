<?php

namespace Tests\Feature\Backend\User;

use Tests\TestCase;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\Auth\User\UserRestored;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Events\Backend\Auth\User\UserPermanentlyDeleted;

class DeleteUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_deleted_users_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/auth/user/deleted');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_must_be_soft_deleted_before_permanently_deleted()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->create();

        $response = $this->get("/admin/auth/user/{$user->id}/delete");

        $response->assertSessionHas(['flash_danger' => __('exceptions.backend.access.users.delete_first')]);
    }

    /** @test */
    public function an_admin_can_restore_users()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/auth/user/{$user->id}/restore");
        $response->assertSessionHas(['flash_success' => __('alerts.backend.users.restored')]);

        $this->assertNull($user->fresh()->deleted_at);
        Event::assertDispatched(UserRestored::class);
    }

    /** @test */
    public function a_user_can_be_permanently_deleted()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/auth/user/{$user->id}/delete");

        $this->assertNull($user->fresh());
        $response->assertSessionHas(['flash_success' => __('alerts.backend.users.deleted_permanently')]);
        Event::assertDispatched(UserPermanentlyDeleted::class);
    }

    /** @test */
    public function a_not_deleted_user_cant_be_restored()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->create();

        $response = $this->get("/admin/auth/user/{$user->id}/restore");

        $response->assertSessionHas(['flash_danger' => __('exceptions.backend.access.users.cant_restore')]);
    }

    /** @test */
    public function a_user_can_be_deleted()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->create();

        $response = $this->delete("/admin/auth/user/{$user->id}");

        $response->assertSessionHas(['flash_success' => __('alerts.backend.users.deleted')]);
        $this->assertDatabaseMissing('users', ['id' => $user->id, 'deleted_at' => null]);
    }
}
