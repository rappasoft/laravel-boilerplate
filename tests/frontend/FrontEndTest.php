<?php

class FrontEndTest extends TestCase {
	public function testHome() {
		$this->visit( '/' )
		     ->see( 'Welcome To Application' );
	}

}
