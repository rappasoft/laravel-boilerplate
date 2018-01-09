<?php

namespace Tests\Feature\Frontend;

use App\Models\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_login_route_exists()
    {
        $this->get('/login')->assertStatus(200);
    }

    /** @test */
    public function a_user_can_login_with_email_and_password()
    {
        $user = factory(User::class)->create([
            'email' => 'john@example.com',
            'password' => bcrypt('secret')
        ]);

        $this->post('/login',[
            'email' => 'john@example.com',
            'password' => 'secret'
        ]);

        $this->assertAuthenticatedAs($user);
    }
}
