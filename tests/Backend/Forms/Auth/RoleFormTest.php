<?php

use App\Models\Auth\Role;
use Tests\BrowserKitTestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\Auth\Role\RoleCreated;
use App\Events\Backend\Auth\Role\RoleDeleted;
use App\Events\Backend\Auth\Role\RoleUpdated;

/**
 * Class RoleFormTest.
 */
class RoleFormTest extends BrowserKitTestCase
{
    public function testCreateRoleRequiredFieldsAll()
    {
        // All Permissions
        $this->actingAs($this->admin)
             ->visit('/admin/auth/role/create')
             ->type('', 'name')
             ->press('Create')
             ->seePageIs('/admin/auth/role/create')
             ->see('The name field is required.');
    }

    public function testCreateRoleRequiredFieldsSpecificPermissions()
    {
        if (config('access.roles.role_must_contain_permission')) {
            // Custom Permissions
            $this->actingAs($this->admin)
                ->visit('/admin/auth/role/create')
                ->type('Test Role', 'name')
                ->press('Create')
                ->seePageIs('/admin/auth/role/create')
                ->see('You must select at least one permission for this role.');
        }
    }

    public function testCreateRoleFormSpecificPermissions()
    {
        // Make sure our events are fired
        Event::fake();

        // Test create with some permissions
        $this->actingAs($this->admin)
             ->visit('/admin/auth/role/create')
             ->submitForm('Create', [
                 'name' => 'Test Role',
                 'permissions' => ['view backend'],
             ])
             ->seePageIs('/admin/auth/role')
             ->see('The role was successfully created.')
             ->seeInDatabase(config('permission.table_names.roles'), ['name' => 'Test Role'])
             ->seeInDatabase(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => 4]);

        Event::assertDispatched(RoleCreated::class);
    }

    public function testRoleAlreadyExists()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/auth/role/create')
            ->submitForm('Create', [
                'name' => 'administrator',
                'permissions' => ['view backend'],
            ])
             ->seePageIs('/admin/auth/role/create')
             ->see('A role already exists with the name administrator');
    }

    public function testRoleRequiresPermission()
    {
        config(['access.roles.role_must_contain_permission' => true]);

        $this->actingAs($this->admin)
             ->visit('/admin/auth/role/create')
            ->submitForm('Create', [
                'name' => 'Test Role',
                'permissions' => [],
            ])
             ->seePageIs('/admin/auth/role/create')
             ->see('You must select at least one permission for this role.');
    }

    public function testUpdateRoleRequiredFields()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/auth/role/2/edit')
             ->type('', 'name')
             ->press('Update')
             ->seePageIs('/admin/auth/role/2/edit')
             ->see('The name field is required.');
    }

    public function testUpdateRoleFormAll()
    {
        // Make sure our events are fired
        Event::fake();

        $this->actingAs($this->admin)
             ->visit('/admin/auth/role/2/edit')
             ->type('Executive Edited', 'name')
             ->press('Update')
             ->seePageIs('/admin/auth/role')
             ->see('The role was successfully updated.')
             ->seeInDatabase(config('permission.table_names.roles'), ['id' => 2, 'name' => 'Executive Edited']);

        Event::assertDispatched(RoleUpdated::class);
    }

    public function testUpdateRoleFormSpecificPermissions()
    {
        // Make sure our events are fired
        Event::fake();

        $this->actingAs($this->admin)
             ->notSeeInDatabase(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => 3])
             ->visit('/admin/auth/role/3/edit')
            ->submitForm('Update', [
                'permissions' => ['view backend'],
            ])
             ->seePageIs('/admin/auth/role')
             ->see('The role was successfully updated.')
             ->seeInDatabase(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => 3]);

        Event::assertDispatched(RoleUpdated::class);
    }

    public function testUpdateRoleRequiresPermission()
    {
        if (config('access.roles.role_must_contain_permission')) {
            $this->actingAs($this->admin)
                ->visit('/admin/auth/role/3/edit')
                ->press('Update')
                ->seePageIs('/admin/auth/role/3/edit')
                ->see('You must select at least one permission for this role.');
        }
    }

    public function testDeleteRoleForm()
    {
        // Make sure our events are fired
        Event::fake();

        $role = Role::create(['name' => 'Test Role']);

        $this->actingAs($this->admin)
             ->seeInDatabase(config('permission.table_names.roles'), ['id' => $role->id])
             ->delete('/admin/auth/role/'.$role->id)
             ->assertRedirectedTo('/admin/auth/role')
             ->notSeeInDatabase(config('permission.table_names.roles'), ['id' => $role->id])
             ->seeInSession(['flash_success' => 'The role was successfully deleted.']);

        Event::assertDispatched(RoleDeleted::class);
    }

    public function testDeleteRoleWithPermissions()
    {
        // Make sure our events are fired
        Event::fake();

        // Remove users from role first because it will error on that first
        DB::table(config('permission.table_names.model_has_roles'))->where('role_id', 2)->delete();

        $this->actingAs($this->admin)
             ->visit('/admin/auth/role')
             ->delete('/admin/auth/role/2')
             ->assertRedirectedTo('/admin/auth/role')
             ->notSeeInDatabase(config('permission.table_names.roles'), ['id' => 2])
             ->seeInSession(['flash_success' => 'The role was successfully deleted.']);

        Event::assertDispatched(RoleDeleted::class);
    }

    public function testCanNotDeleteAdministratorRole()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/auth/role')
             ->delete('/admin/auth/role/1')
             ->assertRedirectedTo('/admin/auth/role')
             ->seeInDatabase(config('permission.table_names.roles'), ['id' => 1, 'name' => 'administrator'])
             ->seeInSession(['flash_danger' => 'You can not delete the administrator role.']);
    }
}
