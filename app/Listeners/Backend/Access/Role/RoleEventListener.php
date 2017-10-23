<?php

namespace App\Listeners\Backend\Access\Role;

/**
 * Class RoleEventListener.
 */
class RoleEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Role';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->role->id)
            ->withText('trans("history.backend.roles.created") <strong>'.$event->role->name.'</strong>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->log();
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->role->id)
            ->withText('trans("history.backend.roles.updated") <strong>'.$event->role->name.'</strong>')
            ->withIcon('save')
            ->withClass('bg-aqua')
            ->log();
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->role->id)
            ->withText('trans("history.backend.roles.deleted") <strong>'.$event->role->name.'</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->log();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Access\Role\RoleCreated::class,
            'App\Listeners\Backend\Access\Role\RoleEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Access\Role\RoleUpdated::class,
            'App\Listeners\Backend\Access\Role\RoleEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Access\Role\RoleDeleted::class,
            'App\Listeners\Backend\Access\Role\RoleEventListener@onDeleted'
        );
    }
}
