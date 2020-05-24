@if ($model->id === config('boilerplate.access.roles.admin') || ($logged_in_user->cannot('access.roles.edit') && $logged_in_user->cannot('access.roles.destroy')))
    {{ emptyCell() }}
@else
    <x-utils.edit-button :href="route('admin.auth.role.edit', $model)" permission="access.roles.edit" />
    <x-utils.delete-button :href="route('admin.auth.role.destroy', $model)" permission="access.roles.destroy" />
@endif
