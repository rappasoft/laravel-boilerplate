<?php

namespace Tests\Browser\Pages\Frontend\Auth;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Page;

/**
 * Class AccountConfirmation.
 */
class AccountConfirmation extends Page
{
    /**
     * @var
     */
    protected $confirmation_code;

    /**
     * AccountConfirm constructor.
     *
     * @param $confirmation_code
     */
    public function __construct($confirmation_code)
    {
        $this->confirmation_code = $confirmation_code;
    }

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/account/confirm/'.$this->confirmation_code;
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
