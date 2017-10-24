<?php

namespace Tests\Browser\Pages\Backend;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class LogViewerLogs extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/log-viewer/logs';
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
            '@show' => 'tr:first-of-type td:last-of-type a.btn-info',
            '@error' => 'a.error',
        ];
    }

    /**
     * Go to the log for the current date.
     *
     * @param  \Laravel\Dusk\Browser  $browser
     * @return void
     */
    public function checkSingleLog(Browser $browser)
    {
        $browser->press('@show');
    }
}
