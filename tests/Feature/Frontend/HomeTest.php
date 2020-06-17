<?php

namespace Tests\Feature\Frontend;

use Tests\TestCase;

/**
 * Class HomeTest.
 */
class HomeTest extends TestCase
{
    /** @test */
    public function the_home_page_exists()
    {
        $this->get('/')->assertOk();
    }
}
