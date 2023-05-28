<?php

namespace App\Domains\Auth\Listeners;

use App\Domains\Auth\Events\Example\ExampleCreated;
use App\Domains\Auth\Events\Example\ExampleDeleted;
use App\Domains\Auth\Events\Example\ExampleDestroyed;
use App\Domains\Auth\Events\Example\ExampleRestored;
use App\Domains\Auth\Events\Example\ExampleUpdated;

/**
 * Class ExampleEventListener.
 */
class ExampleEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        activity('example')
            ->performedOn($event->example)
            ->withProperties([
                'example' => [
                    'name' => $event->example->name,
                ],
            ])
            ->log(':causer.name created :subject.name');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        activity('example')
            ->performedOn($event->example)
            ->withProperties([
                'example' => [
                    'name' => $event->example->name,
                ],
            ])
            ->log(':causer.name updated :subject.name');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        activity('example')
            ->performedOn($event->example)
            ->log(':causer.name deleted :subject.name');
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        activity('example')
            ->performedOn($event->example)
            ->log(':causer.name restored :subject.name');
    }

    /**
     * @param $event
     */
    public function onDestroyed($event)
    {
        activity('example')
            ->performedOn($event->example)
            ->log(':causer.name permanently deleted :subject.name');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            ExampleCreated::class,
            'App\Domains\Auth\Listeners\ExampleEventListener@onCreated'
        );

        $events->listen(
            ExampleUpdated::class,
            'App\Domains\Auth\Listeners\ExampleEventListener@onUpdated'
        );

        $events->listen(
            ExampleDeleted::class,
            'App\Domains\Auth\Listeners\ExampleEventListener@onDeleted'
        );

        $events->listen(
            ExampleRestored::class,
            'App\Domains\Auth\Listeners\ExampleEventListener@onRestored'
        );

        $events->listen(
            ExampleDestroyed::class,
            'App\Domains\Auth\Listeners\ExampleEventListener@onDestroyed'
        );
    }
}
