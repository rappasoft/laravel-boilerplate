<?php

namespace App\Listeners\Backend\Access\User;

/**
 * Class UserEventListener.
 */
class UserEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'User';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.backend.users.created") '.$event->user->name,
            $event->user->id,
            'plus',
            'bg-green'
        );
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.backend.users.updated") '.$event->user->name,
            $event->user->id,
            'save',
            'bg-aqua'
        );
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.backend.users.deleted") '.$event->user->name,
            $event->user->id,
            'trash',
            'bg-maroon'
        );
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.backend.users.restored") '.$event->user->name,
            $event->user->id,
            'refresh',
            'bg-aqua'
        );
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.backend.users.permanently_deleted") '.$event->user->name,
            $event->user->id,
            'trash',
            'bg-maroon'
        );
    }

    /**
     * @param $event
     */
    public function onPasswordChanged($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.backend.users.changed_password") '.$event->user->name,
            $event->user->id,
            'lock',
            'bg-blue'
        );
    }

    /**
     * @param $event
     */
    public function onDeactivated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.backend.users.deactivated") '.$event->user->name,
            $event->user->id,
            'times',
            'bg-yellow'
        );
    }

    /**
     * @param $event
     */
    public function onReactivated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.backend.users.reactivated") '.$event->user->name,
            $event->user->id,
            'check',
            'bg-green'
        );
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Access\User\UserCreated::class,
            'App\Listeners\Backend\Access\User\UserEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Access\User\UserUpdated::class,
            'App\Listeners\Backend\Access\User\UserEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Access\User\UserDeleted::class,
            'App\Listeners\Backend\Access\User\UserEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\Access\User\UserRestored::class,
            'App\Listeners\Backend\Access\User\UserEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Backend\Access\User\UserPermanentlyDeleted::class,
            'App\Listeners\Backend\Access\User\UserEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\Access\User\UserPasswordChanged::class,
            'App\Listeners\Backend\Access\User\UserEventListener@onPasswordChanged'
        );

        $events->listen(
            \App\Events\Backend\Access\User\UserDeactivated::class,
            'App\Listeners\Backend\Access\User\UserEventListener@onDeactivated'
        );

        $events->listen(
            \App\Events\Backend\Access\User\UserReactivated::class,
            'App\Listeners\Backend\Access\User\UserEventListener@onReactivated'
        );
    }
}
