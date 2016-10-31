<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class RouteTest
 */
class RouteTest extends TestCase
{

	/**
	 * Tests that the home page exists
	 */
	public function testHomePage()
    {
        $this->visitRoute('frontend.index')
             ->assertResponseOk();
    }

	/**
	 *Tests that the macros page exists
	 */
	public function testMacroPage()
	{
		$this->visitRoute('frontend.macros')
			->see('Macro Examples');
	}
}