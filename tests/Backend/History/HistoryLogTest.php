<?php

use Tests\BrowserKitTestCase;

/**
 * Class HistoryLogTest.
 */
class HistoryLogTest extends BrowserKitTestCase
{
    public function testHistoryLogByTypeNameFunction()
    {
        $this->actingAs($this->admin);

        history()
            ->withType('User')
            ->withText(trans('history.backend.users.created').$this->user->name)
            ->withEntity($this->user->id)
            ->withIcon('plus')
            ->withClass('bg-green')
            ->log();

        $this->seeInDatabase('history',
            [
                'type_id'   => 1,
                'user_id'   => $this->admin->id,
                'entity_id' => $this->user->id,
                'icon'      => 'plus',
                'class'     => 'bg-green',
                'text'      => trans('history.backend.users.created').$this->user->name,
            ])
             ->visit('/admin/dashboard')
             ->see('<strong>'.$this->admin->name.'</strong> '.trans('history.backend.users.created').$this->user->name);
    }

    public function testHistoryLogByTypeIdFunction()
    {
        $this->actingAs($this->admin);

        history()
            ->withType(1)
            ->withText(trans('history.backend.users.created').$this->user->name)
            ->withEntity($this->user->id)
            ->withIcon('plus')
            ->withClass('bg-green')
            ->log();

        $this->seeInDatabase('history',
            [
                'type_id'   => 1,
                'user_id'   => $this->admin->id,
                'entity_id' => $this->user->id,
                'icon'      => 'plus',
                'class'     => 'bg-green',
                'text'      => trans('history.backend.users.created').$this->user->name,
            ])
             ->visit('/admin/dashboard')
             ->see('<strong>'.$this->admin->name.'</strong> '.trans('history.backend.users.created').$this->user->name);
    }
}
