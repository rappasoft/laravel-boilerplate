<?php

/**
 * Class FrontEndTest
 */
class FrontEndTest extends TestCase
{
    /**
     *
     */
    public function testHome()
    {
        $this->visit('/')
            ->see('Welcome To Application');
    }
}
