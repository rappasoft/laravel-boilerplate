<?php

namespace Tests\Browser\Pages\Frontend\Auth;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Page;

/**
 * Class ResendAccountConfirmation.
 */
class ResendAccountConfirmation extends Page
{
    /**
     * @var
     */
    protected $user_uuid;

    /**
     * AccountConfirm constructor.
     *
     * @param $user_uuid
     */
    public function __construct($user_uuid)
    {
        $this->user_uuid = $user_uuid;
    }

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/account/confirm/resend/'.$this->user_uuid;
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
