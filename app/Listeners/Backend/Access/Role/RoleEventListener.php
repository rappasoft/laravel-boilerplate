<?php

namespace App\Listeners\Backend\Access\Role;

/**
 * Class RoleEventListener
 * @package App\Listeners\Backend\Access\Role
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
	public function onCreated($event) {
		history()->log(
			$this->history_slug,
			$event->role->id,
			'plus',
			'bg-green',
			'trans("history.backend.roles.created") <strong>'.$event->role->name.'</strong>'
		);
	}

	/**
	 * @param $event
	 */
	public function onUpdated($event) {
		history()->log(
			$this->history_slug,
			$event->role->id,
			'save',
			'bg-aqua',
			'trans("history.backend.roles.updated") <strong>'.$event->role->name.'</strong>'
		);
	}

	/**
	 * @param $event
	 */
	public function onDeleted($event) {
		history()->log(
			$this->history_slug,
			$event->role->id,
			'trash',
			'bg-maroon',
			'trans("history.backend.roles.deleted") <strong>'.$event->role->name.'</strong>'
		);
	}

	/**
	 * Register the listeners for the subscriber.
	 *
	 * @param  \Illuminate\Events\Dispatcher  $events
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