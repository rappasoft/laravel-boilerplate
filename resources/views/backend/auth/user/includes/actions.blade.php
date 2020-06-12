@if ($model->trashed() && $logged_in_user->isAdmin())
    <x-utils.link
        :href="route('admin.auth.user.restore', $model)"
        class="btn btn-info btn-sm"
        icon="fas fa-sync-alt"
        :text="__('Restore')"
        name="confirm-item" />

    @if (config('boilerplate.access.user.permanently_delete'))
        <x-utils.delete-button
            :href="route('admin.auth.user.permanently-delete', $model)"
            :text="__('Permanently Delete')" />
    @endif
@else
    @if ($logged_in_user->isAdmin())
        <x-utils.view-button :href="route('admin.auth.user.show', $model)" />
        <x-utils.edit-button :href="route('admin.auth.user.edit', $model)" />
    @endif

    @if (! $model->isActive())
        <x-utils.link
            :href="route('admin.auth.user.mark', [$model, 1])"
            class="btn btn-primary btn-sm"
            icon="fas fa-sync-alt"
            :text="__('Restore')"
            name="confirm-item"
            permission="access.user.reactivate" />
    @endif

    @if ($model->id !== $logged_in_user->id && !$model->isMasterAdmin() && $logged_in_user->isAdmin())
        <x-utils.delete-button :href="route('admin.auth.user.destroy', $model)" />
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
                    permission="access.user.change-password" />
            </div>
        </div>
    @elseif (
        !$model->isMasterAdmin() && // This is not the master admin
        $model->isActive() && // The account is active
        $model->id !== $logged_in_user->id && // It's not the person logged in
        // Any they have at lease one of the abilities in this dropdown
        (
            $logged_in_user->can('access.user.change-password') ||
            $logged_in_user->can('access.user.clear-session') ||
            $logged_in_user->can('access.user.impersonate') ||
            $logged_in_user->can('access.user.deactivate')
        )
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
                    permission="access.user.change-password" />

                @if ($model->id !== $logged_in_user->id && !$model->isMasterAdmin())
                    <x-utils.link
                        :href="route('admin.auth.user.clear-session', $model)"
                        class="dropdown-item"
                        :text="__('Clear Session')"
                        name="confirm-item"
                        permission="access.user.clear-session" />

                    @canBeImpersonated($model)
                        <x-utils.link
                            :href="route('impersonate', $model->id)"
                            class="dropdown-item"
                            :text="__('Login As ' . $model->name)"
                            permission="access.user.impersonate" />
                    @endCanBeImpersonated

                    <x-utils.link
                        :href="route('admin.auth.user.mark', [$model, 0])"
                        class="dropdown-item"
                        :text="__('Deactivate')"
                        name="confirm-item"
                        permission="access.user.deactivate" />
                @endif
            </div>
        </div>
    @endif
@endif
