<?php

if ($e instanceof \App\Exceptions\Backend\Access\User\UserNeedsRolesException)
{
	return redirect()->route('admin.access.users.edit', $e->userID())->withInput()->withFlashDanger($e->validationErrors());
}