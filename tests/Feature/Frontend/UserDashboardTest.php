<?php

namespace Tests\Feature\Frontend;

use App\Models\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserDashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauthenticated_users_cant_access_the_dashboard()
    {
        $this->get('/dashboard')->assertRedirect('/login');
    }
}
