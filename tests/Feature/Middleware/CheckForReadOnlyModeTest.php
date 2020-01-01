<?php

namespace Tests\Feature\Middleware;

use App\Models\Auth\Role;
use App\Models\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class CheckForReadOnlyModeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_not_alter_data_if_read_only_mode_is_enabled()
    {
        config(['app.read_only' => true]);
        $role = factory(Role::class)->create();

        $this->loginAsAdmin();

        $response = $this->delete("/admin/auth/role/{$role->id}");

        $this->assertEquals($response->getStatusCode(), Response::HTTP_UNAUTHORIZED);
        $this->assertDatabaseHas(config('permission.table_names.roles'), ['id' => $role->id]);
    }

    /** @test */
    public function a_user_can_alter_data_if_read_only_mode_is_disabled()
    {
        config(['app.read_only' => false]);
        $role = factory(Role::class)->create();

        $this->loginAsAdmin();

        $response = $this->followingRedirects()
            ->delete("/admin/auth/role/{$role->id}");

        $this->assertEquals($response->getStatusCode(), Response::HTTP_OK);
        $this->assertDatabaseMissing(config('permission.table_names.roles'), ['id' => $role->id]);
    }

    /** @test */
    public function a_user_can_login_if_read_only_mode_is_enabled()
    {
        config(['app.read_only' => true]);

        $user = factory(User::class)->create([
            'email' => 'john@example.com',
            'password' => 'secret',
        ]);

        $this->post('/login', [
            'email' => 'john@example.com',
            'password' => 'secret',
        ]);

        $this->assertAuthenticatedAs($user);
    }
}
