<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Auth\Role;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Auth\User\UserCreated;
use App\Events\Backend\Auth\User\UserUpdated;
use App\Repositories\Backend\Auth\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    protected function setUp()
    {
        parent::setUp();

        $this->userRepository = $this->app->make(UserRepository::class);
        // We create a test-role because almost every test need one
        factory(Role::class)->create(['name' => 'test-role']);
    }

    protected function getValidUserData($userData = [])
    {
        return array_merge([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'timezone' => 'UTC',
            'password' => 'secret',
            'roles' => ['test-role'],
        ], $userData);
    }

    /** @test */
    public function it_can_count_unconfirmed_users()
    {
        factory(User::class, 30)->states('unconfirmed')->create();

        $this->assertEquals(30, $this->userRepository->getUnconfirmedCount());
    }

    /** @test */
    public function it_can_paginate_the_active_users()
    {
        factory(User::class, 30)->create();

        $paginatedUsers = $this->userRepository->getActivePaginated(25);

        $this->assertEquals(2, $paginatedUsers->lastPage());
        $this->assertEquals(25, $paginatedUsers->perPage());
        $this->assertEquals(30, $paginatedUsers->total());

        $newPaginatedUsers = $this->userRepository->getActivePaginated(5);

        $this->assertEquals(5, $newPaginatedUsers->perPage());
    }

    /** @test */
    public function it_can_paginate_the_inactive_users()
    {
        factory(User::class, 30)->create();
        factory(User::class, 25)->states('inactive')->create();

        $paginatedUsers = $this->userRepository->getInactivePaginated(10);

        $this->assertEquals(3, $paginatedUsers->lastPage());
        $this->assertEquals(10, $paginatedUsers->perPage());
        $this->assertEquals(25, $paginatedUsers->total());
    }

    /** @test */
    public function it_can_paginate_the_soft_deleted_inactive_users()
    {
        factory(User::class, 30)->create();
        factory(User::class, 25)->states('softDeleted')->create();

        $paginatedUsers = $this->userRepository->getDeletedPaginated(10);

        $this->assertEquals(3, $paginatedUsers->lastPage());
        $this->assertEquals(10, $paginatedUsers->perPage());
        $this->assertEquals(25, $paginatedUsers->total());
    }

    /** @test */
    public function it_can_create_new_users()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $this->assertEquals(0, User::count());

        $this->userRepository->create($this->getValidUserData());

        $this->assertEquals(1, User::count());

        Event::assertDispatched(UserCreated::class);
    }

    /** @test */
    public function it_can_update_existing_users()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);
        // We need at least one role to create a user
        $user = factory(User::class)->create();

        $this->userRepository->update($user, $this->getValidUserData([
            'first_name' => 'updated',
            'last_name' => 'name',
            'email' => 'new@email.com',
        ]));

        $this->assertEquals('updated', $user->fresh()->first_name);
        $this->assertEquals('name', $user->fresh()->last_name);
        $this->assertEquals('new@email.com', $user->fresh()->email);

        Event::assertDispatched(UserUpdated::class);
    }
}
