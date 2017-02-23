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
        history()->withType($this->history_slug)
            ->withEntity($event->user->id)
            ->withText('__("created user") <strong>{user}</strong>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->withAssets([
                'user_link' => ['admin.access.user.show', $event->user->name, $event->user->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->user->id)
            ->withText('__("updated user") <strong>{user}</strong>')
            ->withIcon('save')
            ->withClass('bg-aqua')
            ->withAssets([
                'user_link' => ['admin.access.user.show', $event->user->name, $event->user->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->user->id)
            ->withText('__("deleted user") <strong>{user}</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->withAssets([
                'user_link' => ['admin.access.user.show', $event->user->name, $event->user->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->user->id)
            ->withText('__("restored user") <strong>{user}</strong>')
            ->withIcon('refresh')
            ->withClass('bg-aqua')
            ->withAssets([
                'user_link' => ['admin.access.user.show', $event->user->name, $event->user->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->user->id)
            ->withText('__("permanently deleted user") <strong>{user}</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->log();
    }

    /**
     * @param $event
     */
    public function onPasswordChanged($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->user->id)
            ->withText('__("changed password for user") <strong>{user}</strong>')
            ->withIcon('lock')
            ->withClass('bg-blue')
            ->withAssets([
                'user_link' => ['admin.access.user.show', $event->user->name, $event->user->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onDeactivated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->user->id)
            ->withText('__("deactivated user") <strong>{user}</strong>')
            ->withIcon('times')
            ->withClass('bg-yellow')
            ->withAssets([
                'user_link' => ['admin.access.user.show', $event->user->name, $event->user->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onReactivated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->user->id)
            ->withText('__("reactivated user") <strong>{user}</strong>')
            ->withIcon('check')
            ->withClass('bg-green')
            ->withAssets([
                'user_link' => ['admin.access.user.show', $event->user->name, $event->user->id],
            ])
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
