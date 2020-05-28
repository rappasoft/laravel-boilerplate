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

    @if (! $model->isActive())
        <x-utils.link
            :href="route('admin.auth.user.mark', [$model, 1])"
            class="btn btn-primary btn-sm"
            icon="fas fa-sync-alt"
            :text="__('Restore')"
            name="confirm-item"
            permission="access.users.reactivate" />
    @endif

    @if ($model->id !== 1 && $model->id !== auth()->id())
        <x-utils.delete-button :href="route('admin.auth.user.destroy', $model)" permission="access.users.delete" />
    @endif

    @if ($model->isActive())
        <div class="dropdown d-inline-block">
            <a class="btn btn-sm btn-secondary dropdown-toggle" id="dropdownMenuLink" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                More
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    {{--            <a class="dropdown-item" href="#">Change Password</a>--}}

                @if ($model->id !== 1 && $model->id !== auth()->id())
                    <x-utils.link
                        :href="route('admin.auth.user.clear-session', $model)"
                        class="dropdown-item"
                        :text="__('Clear Session')"
                        name="confirm-item"
                        permission="access.users.clear-session" />

                    @canBeImpersonated($model)
                        <x-utils.link
                            :href="route('impersonate', $model->id)"
                            class="dropdown-item"
                            :text="__('Login As ' . $model->name)"
                            permission="access.users.impersonate" />
                    @endCanBeImpersonated

                    <x-utils.link
                        :href="route('admin.auth.user.mark', [$model, 0])"
                        class="dropdown-item"
                        :text="__('Deactivate')"
                        name="confirm-item"
                        permission="access.users.deactivate" />
                @endif
            </div>
        </div>
    @endif
@endif
