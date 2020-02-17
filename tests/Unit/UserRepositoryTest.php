<?php

namespace Tests\Unit;

use App\Events\Backend\Auth\User\UserCreated;
use App\Events\Backend\Auth\User\UserUpdated;
use App\Models\Auth\Role;
use App\Models\Auth\User;
use App\Repositories\Backend\Auth\UserRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    protected function setUp(): void
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

        $this->assertSame(30, $this->userRepository->getUnconfirmedCount());
    }

    /** @test */
    public function it_can_paginate_the_active_users()
    {
        factory(User::class, 30)->create();

        $paginatedUsers = $this->userRepository->getActivePaginated(25);

        $this->assertSame(2, $paginatedUsers->lastPage());
        $this->assertSame(25, $paginatedUsers->perPage());
        $this->assertSame(30, $paginatedUsers->total());

        $newPaginatedUsers = $this->userRepository->getActivePaginated(5);

        $this->assertSame(5, $newPaginatedUsers->perPage());
    }

    /** @test */
    public function it_can_paginate_the_inactive_users()
    {
        factory(User::class, 30)->create();
        factory(User::class, 25)->states('inactive')->create();

        $paginatedUsers = $this->userRepository->getInactivePaginated(10);

        $this->assertSame(3, $paginatedUsers->lastPage());
        $this->assertSame(10, $paginatedUsers->perPage());
        $this->assertSame(25, $paginatedUsers->total());
    }

    /** @test */
    public function it_can_paginate_the_soft_deleted_inactive_users()
    {
        factory(User::class, 30)->create();
        factory(User::class, 25)->states('softDeleted')->create();

        $paginatedUsers = $this->userRepository->getDeletedPaginated(10);

        $this->assertSame(3, $paginatedUsers->lastPage());
        $this->assertSame(10, $paginatedUsers->perPage());
        $this->assertSame(25, $paginatedUsers->total());
    }

    /** @test */
    public function it_can_create_new_users()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $this->assertSame(0, User::count());

        $this->userRepository->create($this->getValidUserData());

        $this->assertSame(1, User::count());

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

        $this->assertSame('updated', $user->fresh()->first_name);
        $this->assertSame('name', $user->fresh()->last_name);
        $this->assertSame('new@email.com', $user->fresh()->email);

        Event::assertDispatched(UserUpdated::class);
    }
}
