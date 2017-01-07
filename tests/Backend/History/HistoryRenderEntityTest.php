<?php

use App\Models\Access\User\User;
use App\Repositories\Backend\History\Facades\History;

/**
 * Class HistoryRenderEntityTest.
 */
class HistoryRenderEntityTest extends TestCase
{
    public function testViewOnlyHasHistoryOfEntity()
    {
        $this->actingAs($this->admin);

        $test_user = factory(User::class)->create();

        History::log('User', 'trans("history.backend.users.created") '.$this->user->name, $this->user->id, 'plus', 'bg-green');
        History::log('User', 'trans("history.backend.users.updated") '.$this->user->name, $this->user->id, 'pencil', 'bg-blue');
        History::log('User', 'trans("history.backend.users.deleted") '.$this->user->name, $this->user->id, 'trash', 'bg-red');
        History::log('User', 'trans("history.backend.roles.created") '.$test_user->name, $test_user->id, 'plus', 'bg-red');
        History::log('User', 'trans("history.backend.roles.updated") '.$test_user->name, $test_user->id, 'pencil', 'bg-red');
        History::log('User', 'trans("history.backend.roles.deleted") '.$test_user->name, $test_user->id, 'trash', 'bg-red');

        $this->visit('/admin/access/user/'.$this->user->id)
            ->see('<strong>'.$this->admin->name.'</strong> created user '.$this->user->name)
            ->see('<strong>'.$this->admin->name.'</strong> updated user '.$this->user->name)
            ->see('<strong>'.$this->admin->name.'</strong> deleted user '.$this->user->name)
            ->dontSee('<strong>'.$this->admin->name.'</strong> created user '.$test_user->name)
            ->dontSee('<strong>'.$this->admin->name.'</strong> updated user '.$test_user->name)
            ->dontSee('<strong>'.$this->admin->name.'</strong> deleted user '.$test_user->name);
    }
}
