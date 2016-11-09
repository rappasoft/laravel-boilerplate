<?php

use App\Repositories\Backend\History\Facades\History;

/**
 * Class HistoryLogTest
 */
class HistoryLogTest extends TestCase
{
	public function testHistoryLogFunction() {
		$this->actingAs($this->admin);

		History::log('User', 'trans("history.backend.users.created") ' . $this->user->name, $this->user->id, 'plus', 'bg-green');

		$this->seeInDatabase('history', [
			'type_id' => 1,
			'user_id' => 1,
			'entity_id' => $this->user->id,
			'icon' => 'plus',
			'class' => 'bg-green',
			'text' => 'trans("history.backend.users.created") ' . $this->user->name,
		])
		->visit('/admin/dashboard')
		->see('<strong>Admin Istrator</strong> created user ' . $this->user->name);
	}
}