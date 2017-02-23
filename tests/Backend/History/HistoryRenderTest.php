<?php

use Tests\BrowserKitTestCase;

/**
 * Class HistoryRenderTest.
 */
class HistoryRenderTest extends BrowserKitTestCase
{
    public function testDashboardDisplaysHistory()
    {
        $this->actingAs($this->admin);

        history()
            ->withType('User')
            ->withText(__('created user').$this->user->name)
            ->withEntity($this->user->id)
            ->withIcon('plus')
            ->withClass('bg-green')
            ->log();

        $this->visit('/admin/dashboard')
             ->see('<strong>'.$this->admin->name.'</strong> '.__('created user').$this->user->name);
    }

    public function testTypeDisplaysHistory()
    {
        $this->actingAs($this->admin);

        history()
            ->withType('User')
            ->withText(__('created user').$this->user->name)
            ->withEntity($this->user->id)
            ->withIcon('plus')
            ->withClass('bg-green')
            ->log();

        $this->visit('/admin/access/user')
             ->see('<strong>'.$this->admin->name.'</strong> '.__('created user').$this->user->name);
    }

    public function testEntityDisplaysHistory()
    {
        $this->actingAs($this->admin);

        history()
            ->withType('User')
            ->withText(__('created user').$this->user->name)
            ->withEntity($this->user->id)
            ->withIcon('plus')
            ->withClass('bg-green')
            ->log();

        $this->visit('/admin/access/user/3')
             ->see('<strong>'.$this->admin->name.'</strong> '.__('created user').$this->user->name);
    }
}
