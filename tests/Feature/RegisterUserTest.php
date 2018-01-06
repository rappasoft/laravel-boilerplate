<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Auth\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Frontend\Auth\UserRegistered;
use App\Repositories\Backend\Auth\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Helper function for registering a user.
     * @param array $userData
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function registerUser($userData = [])
    {
        factory(Role::class)->create(['name' => 'user']);

        return $this->post('/register', array_merge([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ], $userData));
    }

    /** @test */
    public function user_registration_can_be_disabled()
    {
        $this->app['config']->set('access.registration', false);
        $this->get('/register')->assertStatus(404);
    }

    /** @test */
    public function a_user_can_register_an_account()
    {
        $this->registerUser([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $newUser = (new UserRepository())->where('email', 'john@example.com')->first();
        $this->assertEquals($newUser->first_name, 'John');
        $this->assertEquals($newUser->last_name, 'Doe');
        $this->assertTrue(Hash::check('password', $newUser->password));
    }

    /** @test */
    public function an_event_get_fired_on_registration()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $this->registerUser();

        Event::assertDispatched(UserRegistered::class);
    }

    /** @test */
    public function first_name_is_required()
    {
        $response = $this->post('/register', [
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('first_name');
    }

    /** @test */
    public function last_name_is_required()
    {
        $response = $this->post('/register', [
            'first_name' => 'John',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('last_name');
    }

    /** @test */
    public function email_is_required()
    {
        $response = $this->post('/register', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function password_must_be_confirmed()
    {
        $response = $this->post('/register', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors('password');
    }
}
