{{--@if ($model->id === 1 || ($logged_in_user->cannot('access.users.edit') && $logged_in_user->cannot('access.users.destroy')))--}}
{{--    {{ emptyCell() }}--}}
{{--@else--}}
{{--    <x-utils.edit-button :href="route('admin.auth.user.edit', $model)" permission="access.users.edit" />--}}
{{--    <x-utils.delete-button :href="route('admin.auth.user.destroy', $model)" permission="access.users.destroy" />--}}
{{--@endif--}}

<x-utils.view-button :href="route('admin.auth.user.show', $model)" permission="access.users.read" />
