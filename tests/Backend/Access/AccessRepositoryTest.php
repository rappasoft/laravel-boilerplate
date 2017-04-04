<?php

use Tests\BrowserKitTestCase;

/**
 * Class AccessRepositoryTest.
 */
class AccessRepositoryTest extends BrowserKitTestCase
{
    public function testGetUsersByPermissionUsingName()
    {
        $results = app()->make(\App\Repositories\Backend\Access\User\UserRepository::class)
            ->getByPermission('view-backend')
            ->toArray();

        $this->assertCount(1, $results);
        $this->assertArraySubset(['name' => $this->executive->name], $results[0]);
    }

    public function testGetUsersByPermissionsUsingNames()
    {
        $this->userRole->permissions()->sync([1]);

        $results = app()->make(\App\Repositories\Backend\Access\User\UserRepository::class)
            ->getByPermission(['view-backend'])
            ->toArray();

        $this->assertCount(2, $results);
        $this->assertArraySubset(['name' => $this->executive->name], $results[0]);
        $this->assertArraySubset(['name' => $this->user->name], $results[1]);
    }

    public function testGetUsersByPermissionUsingId()
    {
        $results = app()->make(\App\Repositories\Backend\Access\User\UserRepository::class)
            ->getByPermission(1, 'id')
            ->toArray();

        $this->assertCount(1, $results);
        $this->assertArraySubset(['name' => $this->executive->name], $results[0]);
    }

    public function testGetUsersByPermissionsUsingIds()
    {
        $this->userRole->permissions()->sync([1]);

        $results = app()->make(\App\Repositories\Backend\Access\User\UserRepository::class)
            ->getByPermission([1], 'id')
            ->toArray();

        $this->assertCount(2, $results);
        $this->assertArraySubset(['name' => $this->executive->name], $results[0]);
        $this->assertArraySubset(['name' => $this->user->name], $results[1]);
    }

    public function testGetUsersByRoleUsingName()
    {
        $results = app()->make(\App\Repositories\Backend\Access\User\UserRepository::class)
            ->getByRole('User')
            ->toArray();

        $this->assertCount(1, $results);
        $this->assertArraySubset(['name' => $this->user->name], $results[0]);
    }

    public function testGetUsersByRolesUsingNames()
    {
        $results = app()->make(\App\Repositories\Backend\Access\User\UserRepository::class)
            ->getByRole(['User', 'Executive'])
            ->toArray();

        $this->assertCount(2, $results);
        $this->assertArraySubset(['name' => $this->executive->name], $results[0]);
        $this->assertArraySubset(['name' => $this->user->name], $results[1]);
    }

    public function testGetUsersByRoleUsingId()
    {
        $results = app()->make(\App\Repositories\Backend\Access\User\UserRepository::class)
            ->getByRole(1, 'id')
            ->toArray();

        $this->assertCount(1, $results);
        $this->assertArraySubset(['name' => $this->admin->name], $results[0]);
    }

    public function testGetUsersByRolesUsingIds()
    {
        $results = app()->make(\App\Repositories\Backend\Access\User\UserRepository::class)
            ->getByRole([1, 3], 'id')
            ->toArray();

        $this->assertCount(2, $results);
        $this->assertArraySubset(['name' => $this->admin->name], $results[0]);
        $this->assertArraySubset(['name' => $this->user->name], $results[1]);
    }
}
