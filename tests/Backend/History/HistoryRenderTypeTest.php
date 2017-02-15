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
            ->withText('trans("history.backend.users.created") '.$this->user->name)
            ->withEntity($this->user->id)
            ->withIcon('plus')
            ->withClass('bg-green')
            ->log();

        history()
            ->withType('User')
            ->withText('trans("history.backend.users.updated") '.$this->user->name)
            ->withEntity($this->user->id)
            ->withIcon('pencil')
            ->withClass('bg-blue')
            ->log();

        history()
            ->withType('User')
            ->withText('trans("history.backend.users.deleted") '.$this->user->name)
            ->withEntity($this->user->id)
            ->withIcon('trash')
            ->withClass('bg-red')
            ->log();

        history()
            ->withType('Role')
            ->withText('trans("history.backend.roles.created") '.$this->adminRole->name)
            ->withEntity($this->adminRole->id)
            ->withIcon('plus')
            ->withClass('bg-red')
            ->log();

        history()
            ->withType('Role')
            ->withText('trans("history.backend.roles.updated") '.$this->adminRole->name)
            ->withEntity($this->adminRole->id)
            ->withIcon('pencil')
            ->withClass('bg-red')
            ->log();

        history()
            ->withType('Role')
            ->withText('trans("history.backend.roles.deleted") ')
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
