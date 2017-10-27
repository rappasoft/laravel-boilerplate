<?php

namespace Tests\Browser\Backend\Routes;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Backend\LogViewerLogs;
use Tests\Browser\Pages\Backend\LogViewerDashboard;

/**
 * Class LogViewerTest.
 */
class LogViewerTest extends DuskTestCase
{
    public function testLogViewerDashboard()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin)
                ->visit(new LogViewerDashboard)
                ->assertSee('Log Viewer');
        });
    }

    public function testLogViewerList()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin)
                ->visit(new LogViewerLogs)
                ->assertSee('Logs');
        });
    }

    public function testLogViewerSingle()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin)
                ->visit(new LogViewerLogs)
                ->checkSingleLog()
                ->assertSee('Log ['.date('Y-m-d').']');
        });
    }

    // public function testLogViewerSingleType()
    // {
    //     // Figure out a good way to navigate to this route
    //     // instead of making a page and or hardcoded route
    // }
}
