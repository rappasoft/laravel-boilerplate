<?php

namespace Tests\Feature\Frontend;

use Tests\TestCase;

/**
 * Class HomeTest
 *
 * @package Tests\Feature\Frontend
 */
class HomeTest extends TestCase
{

    /** @test */
    public function the_home_page_exists()
    {
        $this->get('/')->assertStatus(200);
    }
}
