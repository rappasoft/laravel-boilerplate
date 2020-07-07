<?php

namespace Tests\Feature\Backend\User;

use App\Domains\Auth\Events\User\UserDeleted;
use App\Domains\Auth\Events\User\UserDestroyed;
use App\Domains\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

/**
 * Class DeleteUserTest.
 */
class DeleteUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_deleted_users_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/auth/user/deleted');

        $response->assertOk();

        $this->logout();

        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/admin/auth/user/deleted');

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

    /** @test */
    public function a_user_can_be_deleted()
    {
        Event::fake();

        $this->loginAsAdmin();

        $user = factory(User::class)->create();

        $response = $this->delete("/admin/auth/user/{$user->id}");

        $response->assertSessionHas(['flash_success' => __('The user was successfully deleted.')]);

        $this->assertSoftDeleted('users', ['id' => $user->id]);

        Event::assertDispatched(UserDeleted::class);
    }

    /** @test */
    public function a_user_can_be_permanently_deleted()
    {
        Event::fake();

        config(['boilerplate.access.user.permanently_delete' => true]);

        $this->loginAsAdmin();

        $user = factory(User::class)->state('deleted')->create();

        $this->assertSoftDeleted('users', ['id' => $user->id]);

        $response = $this->delete("/admin/auth/user/{$user->id}/permanently-delete");

        $response->assertSessionHas(['flash_success' => __('The user was permanently deleted.')]);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);

        Event::assertDispatched(UserDestroyed::class);
    }

    /** @test */
    public function a_user_cant_be_permanently_deleted_if_the_option_is_off()
    {
        config(['boilerplate.access.user.permanently_delete' => false]);

        $this->loginAsAdmin();

        $user = factory(User::class)->state('deleted')->create();

        $this->assertSoftDeleted('users', ['id' => $user->id]);

        $this->delete("/admin/auth/user/{$user->id}/permanently-delete")->assertNotFound();

        $this->assertSoftDeleted('users', ['id' => $user->id]);
    }

    /** @test */
    public function a_user_can_be_restored()
    {
        $this->loginAsAdmin();

        $user = factory(User::class)->state('deleted')->create();

        $this->assertSoftDeleted('users', ['id' => $user->id]);

        $response = $this->patch("/admin/auth/user/{$user->id}/restore");

        $response->assertSessionHas(['flash_success' => __('The user was successfully restored.')]);

        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }

    /** @test */
    public function the_master_administrator_can_not_be_deleted()
    {
        $admin = $this->getMasterAdmin();
        $user = factory(User::class)->state('admin')->create();
        $user->assignRole($this->getAdminRole());
        $this->actingAs($user);

        $response = $this->delete('/admin/auth/user/'.$admin->id);

        $response->assertSessionHas('flash_danger', __('You can not delete the master administrator.'));

        $this->assertDatabaseHas('users', ['id' => $admin->id, 'deleted_at' => null]);
    }

    /** @test */
    public function a_user_can_not_delete_themselves()
    {
        $user = factory(User::class)->state('admin')->create();
        $user->assignRole($this->getAdminRole());
        $this->actingAs($user);

        $response = $this->delete('/admin/auth/user/'.$user->id);

        $response->assertSessionHas('flash_danger', __('You can not delete yourself.'));

        $this->assertDatabaseHas('users', ['id' => $user->id, 'deleted_at' => null]);
    }

    /** @test */
    public function only_admin_can_delete_users()
    {
        $this->actingAs(factory(User::class)->create());

        $user = factory(User::class)->create();

        $response = $this->delete("/admin/auth/user/{$user->id}");

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }
}
