@if ($model->trashed())
    <x-utils.link
        :href="route('admin.auth.user.restore', $model)"
        class="btn btn-info btn-sm"
        icon="fas fa-sync-alt"
        :text="__('Restore')"
        name="confirm-item"
        permission="access.users.restore" />

    @if (config('boilerplate.access.users.permanently_delete'))
        <x-utils.delete-button :href="route('admin.auth.user.permanently-delete', $model)" permission="access.users.permanently-delete" :text="__('Permanently Delete')" />
    @endif
@else
    <x-utils.view-button :href="route('admin.auth.user.show', $model)" permission="access.users.read" />
    {{--<x-utils.edit-button :href="route('admin.auth.user.edit', $model)" permission="access.users.update" />--}}

    @if ($model->id !== 1 && $model->id !== auth()->id())
        <x-utils.delete-button :href="route('admin.auth.user.destroy', $model)" permission="access.users.delete" />
    @endif

    {{--<div class="dropdown d-inline-block">--}}
    {{--    <a class="btn btn-sm btn-secondary dropdown-toggle" id="dropdownMenuLink" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
    {{--        More--}}
    {{--    </a>--}}

    {{--    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="margin: 0px;">--}}
    {{--        <a class="dropdown-item" href="#">Clear Session</a>--}}
    {{--        <a class="dropdown-item" href="#">Login As {{ $model->name }}</a>--}}
    {{--        <a class="dropdown-item" href="#">Change Password</a>--}}
    {{--        <a class="dropdown-item" href="#">Deactivate</a>--}}
    {{--    </div>--}}
    {{--</div>--}}
@endif
