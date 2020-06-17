<?php

namespace Tests\Feature\Middleware;

use Tests\TestCase;

/**
 * Class SwitchLanguageTest
 *
 * @package Tests\Feature\Middleware
 */
class SwitchLanguageTest extends TestCase
{
    /** @test */
    public function the_language_can_be_switched()
    {
        $response = $this->get('/lang/de');

        $response->assertSessionHas('locale', 'de');
    }
}
