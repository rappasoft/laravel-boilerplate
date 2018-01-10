<?php

namespace Tests\Feature\Backend\Role;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateRoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_name_is_required()
    {
        $this->loginAsAdmin();

        $response = $this->post('/admin/auth/role', ['name' => '']);

        $response->assertSessionHasErrors('name');
    }
}
