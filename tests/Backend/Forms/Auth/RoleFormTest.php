<?php

namespace Tests\Backend\Forms\Auth;

use Tests\TestCase;
use App\Models\Auth\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\Auth\Role\RoleCreated;
use App\Events\Backend\Auth\Role\RoleDeleted;
use App\Events\Backend\Auth\Role\RoleUpdated;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class RoleFormTest.
 */
class RoleFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_name_is_required()
    {
        $this->setUpAcl();

        $response = $this->actingAs($this->admin)
            ->post('/admin/auth/role', ['name' => '']);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function testCreateRoleFormSpecificPermissions()
    {
        $this->setUpAcl();
        // Make sure our events are fired
        Event::fake();

        // Test create with some permissions
        $this->actingAs($this->admin)
            ->followingRedirects()
            ->post('/admin/auth/role', [
                'name' => 'Test Role',
                'permissions' => ['view backend'],
            ])
            ->assertSeeText('The role was successfully created.');

        $this->assertDatabaseHas(config('permission.table_names.roles'), ['name' => 'Test Role']);
        $this->assertDatabaseHas(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => 4]);

        Event::assertDispatched(RoleCreated::class);
    }

    /** @test */
    public function the_role_name_needs_to_be_unique()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->followingRedirects()
            ->post('/admin/auth/role', [
                'name' => 'administrator',
                'permissions' => ['view backend'],
            ])
            ->assertSeeText('A role already exists with the name administrator');
    }

    /** @test */
    public function role_requires_permission()
    {
        $this->setUpAcl();
        config(['access.roles.role_must_contain_permission' => true]);

        $this->actingAs($this->admin)
            ->followingRedirects()
            ->post('/admin/auth/role', [
                'name' => 'Test Role',
                'permissions' => [],
            ])
            ->assertSeeText('You must select at least one permission for this role.');
    }

    /** @test */
    public function name_is_required_when_updating_role()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->followingRedirects()
            ->patch('/admin/auth/role/2', ['name' => ''])
            ->assertSeeText('The name field is required.');
    }

    /** @test */
    public function a_role_name_can_be_updated()
    {
        $this->setUpAcl();
        Event::fake();

        $this->actingAs($this->admin)
            ->patch('/admin/auth/role/2', ['name' => 'Executive Edited', 'permissions' => ['view backend']])
            ->assertSessionHas(['flash_success' => 'The role was successfully updated.']);

        $this->assertDatabaseHas(config('permission.table_names.roles'), ['id' => 2, 'name' => 'Executive Edited']);

        Event::assertDispatched(RoleUpdated::class);
    }

    /** @test */
    public function add_specific_permissions_to_roles()
    {
        $this->setUpAcl();
        Event::fake();

        $this->assertDatabaseMissing(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => 3]);

        //role id 3 is user with setUpAcl()
        $this->actingAs($this->admin)
            ->patch('/admin/auth/role/3', ['name' => 'user', 'permissions' => ['view backend']])
            ->assertSessionHas(['flash_success' => 'The role was successfully updated.']);

        $this->assertDatabaseHas(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => 3]);

        Event::assertDispatched(RoleUpdated::class);
    }

    /** @test */
    public function a_role_can_be_deleted()
    {
        $this->setUpAcl();
        Event::fake();

        $role = factory(Role::class)->create(['name' => 'Test Role']);

        $this->assertDatabaseHas(config('permission.table_names.roles'), ['id' => $role->id]);
        $this->actingAs($this->admin)
            ->delete('/admin/auth/role/'.$role->id)
            ->assertSessionHas(['flash_success' => 'The role was successfully deleted.']);

        $this->assertDatabaseMissing(config('permission.table_names.roles'), ['id' => $role->id]);

        Event::assertDispatched(RoleDeleted::class);
    }

    /** @test */
    public function delete_role_with_permissions()
    {
        $this->setUpAcl();
        // Make sure our events are fired
        Event::fake();

        // Remove users from role first because it will error on that first
        DB::table(config('permission.table_names.model_has_roles'))->where('role_id', 2)->delete();

        $this->actingAs($this->admin)
            ->delete('/admin/auth/role/2')
            ->assertSessionHas(['flash_success' => 'The role was successfully deleted.']);

        $this->assertDatabaseMissing(config('permission.table_names.roles'), ['id' => 2]);

        Event::assertDispatched(RoleDeleted::class);
    }

    /** @test */
    public function administrator_role_can_not_be_deleted()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->delete('/admin/auth/role/1')
            ->assertSessionHas(['flash_danger' => 'You can not delete the administrator role.']);

        $this->assertDatabaseHas(config('permission.table_names.roles'), ['id' => 1, 'name' => 'administrator']);
    }
}
