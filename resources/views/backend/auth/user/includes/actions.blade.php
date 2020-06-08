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
    <x-utils.view-button :href="route('admin.auth.user.show', $model)" permission="access.users.list" />
    <x-utils.edit-button :href="route('admin.auth.user.edit', $model)" permission="access.users.update" />

    @if (! $model->isActive())
        <x-utils.link
            :href="route('admin.auth.user.mark', [$model, 1])"
            class="btn btn-primary btn-sm"
            icon="fas fa-sync-alt"
            :text="__('Restore')"
            name="confirm-item"
            permission="access.users.reactivate" />
    @endif

    @if ($model->id !== $logged_in_user->id && !$model->isMasterAdmin())
        <x-utils.delete-button :href="route('admin.auth.user.destroy', $model)" permission="access.users.delete" />
    @endif

    {{-- The logged in user is the master admin, and the row is the master admin. Only the master admin can do anything to themselves --}}
    @if ($model->isMasterAdmin() && $logged_in_user->isMasterAdmin())
        <div class="dropdown d-inline-block">
            <a class="btn btn-sm btn-secondary dropdown-toggle" id="moreMenuLink" href="#" role="button" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">
                More
            </a>

            <div class="dropdown-menu" aria-labelledby="moreMenuLink">
                <x-utils.link
                    :href="route('admin.auth.user.change-password', $model)"
                    class="dropdown-item"
                    :text="__('Change Password')"
                    permission="access.users.change-password" />
            </div>
        </div>
    @elseif (
        !$model->isMasterAdmin() && // This is not the master admin
        $model->isActive() && // The account is active
        $model->id !== $logged_in_user->id && // It's not the person logged in
        $logged_in_user->hasAnyPermission([ // Any they have at lease one of the abilities in this dropdown
            'access.users.change-password',
            'access.users.clear-session',
            'access.users.impersonate',
            'access.users.deactivate'
        ])
    )
        <div class="dropdown d-inline-block">
            <a class="btn btn-sm btn-secondary dropdown-toggle" id="moreMenuLink" href="#" role="button" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">
                More
            </a>

            <div class="dropdown-menu" aria-labelledby="moreMenuLink">
                <x-utils.link
                    :href="route('admin.auth.user.change-password', $model)"
                    class="dropdown-item"
                    :text="__('Change Password')"
                    permission="access.users.change-password" />

                @if ($model->id !== $logged_in_user->id && !$model->isMasterAdmin())
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
