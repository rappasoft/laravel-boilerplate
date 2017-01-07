<?php

use App\Repositories\Backend\History\Facades\History;

/**
 * Class HistoryRenderTypeTest.
 */
class HistoryRenderTypeTest extends TestCase
{
    public function testViewOnlyHasHistoryOfType()
    {
        $this->actingAs($this->admin);

        History::log('User', 'trans("history.backend.users.created") '.$this->user->name, $this->user->id, 'plus', 'bg-green');
        History::log('User', 'trans("history.backend.users.updated") '.$this->user->name, $this->user->id, 'pencil', 'bg-blue');
        History::log('User', 'trans("history.backend.users.deleted") '.$this->user->name, $this->user->id, 'trash', 'bg-red');
        History::log('Role', 'trans("history.backend.roles.created") '.$this->adminRole->name, $this->adminRole->id, 'plus', 'bg-red');
        History::log('Role', 'trans("history.backend.roles.updated") '.$this->adminRole->name, $this->adminRole->id, 'pencil', 'bg-red');
        History::log('Role', 'trans("history.backend.roles.deleted") '.$this->adminRole->name, $this->adminRole->id, 'trash', 'bg-red');

        $this->visit('/admin/access/user')
            ->see('<strong>'.$this->admin->name.'</strong> created user '.$this->user->name)
            ->see('<strong>'.$this->admin->name.'</strong> updated user '.$this->user->name)
            ->see('<strong>'.$this->admin->name.'</strong> deleted user '.$this->user->name)
            ->dontSee('<strong>'.$this->admin->name.'</strong> created role '.$this->adminRole->name)
            ->dontSee('<strong>'.$this->admin->name.'</strong> updated role '.$this->adminRole->name)
            ->dontSee('<strong>'.$this->admin->name.'</strong> deleted role '.$this->adminRole->name);
    }
}
