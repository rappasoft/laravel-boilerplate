<?php

use Tests\BrowserKitTestCase;

/**
 * Class HistoryRenderTypeTest.
 */
class HistoryRenderTypeTest extends BrowserKitTestCase
{
    public function testViewOnlyHasHistoryOfType()
    {
        $this->actingAs($this->admin);

        history()
            ->withType('User')
            ->withText('__("created user") '.$this->user->name)
            ->withEntity($this->user->id)
            ->withIcon('plus')
            ->withClass('bg-green')
            ->log();

        history()
            ->withType('User')
            ->withText('__("updated user") '.$this->user->name)
            ->withEntity($this->user->id)
            ->withIcon('pencil')
            ->withClass('bg-blue')
            ->log();

        history()
            ->withType('User')
            ->withText('__("deleted user") '.$this->user->name)
            ->withEntity($this->user->id)
            ->withIcon('trash')
            ->withClass('bg-red')
            ->log();

        history()
            ->withType('Role')
            ->withText('__("created role") '.$this->adminRole->name)
            ->withEntity($this->adminRole->id)
            ->withIcon('plus')
            ->withClass('bg-red')
            ->log();

        history()
            ->withType('Role')
            ->withText('__("updated role") '.$this->adminRole->name)
            ->withEntity($this->adminRole->id)
            ->withIcon('pencil')
            ->withClass('bg-red')
            ->log();

        history()
            ->withType('Role')
            ->withText('__("deleted role") ')
            ->withEntity($this->adminRole->id)
            ->withIcon('trash')
            ->withClass('bg-red')
            ->log();

        $this->visit('/admin/access/user')
             ->see('<strong>'.$this->admin->name.'</strong> created user '.$this->user->name)
             ->see('<strong>'.$this->admin->name.'</strong> updated user '.$this->user->name)
             ->see('<strong>'.$this->admin->name.'</strong> deleted user '.$this->user->name)
             ->dontSee('<strong>'.$this->admin->name.'</strong> created role '.$this->adminRole->name)
             ->dontSee('<strong>'.$this->admin->name.'</strong> updated role '.$this->adminRole->name)
             ->dontSee('<strong>'.$this->admin->name.'</strong> deleted role '.$this->adminRole->name);
    }
}
