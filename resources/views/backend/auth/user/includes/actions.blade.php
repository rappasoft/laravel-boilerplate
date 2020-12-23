@if ($user->trashed() && $logged_in_user->hasAllAccess())
    <x-utils.form-button
        :action="route('admin.auth.user.restore', $user)"
        method="patch"
        button-class="btn btn-info btn-sm"
        icon="fas fa-sync-alt"
        name="confirm-item"
    >
        @lang('Restore')
    </x-utils.form-button>

    @if (config('boilerplate.access.user.permanently_delete'))
        <x-utils.delete-button
            :href="route('admin.auth.user.permanently-delete', $user)"
            :text="__('Permanently Delete')" />
    @endif
@else
    @if ($logged_in_user->hasAllAccess())
        <x-utils.view-button :href="route('admin.auth.user.show', $user)" />
        <x-utils.edit-button :href="route('admin.auth.user.edit', $user)" />
    @endif

    @if (! $user->isActive())
        <x-utils.form-button
            :action="route('admin.auth.user.mark', [$user, 1])"
            method="patch"
            button-class="btn btn-primary btn-sm"
            icon="fas fa-sync-alt"
            name="confirm-item"
            permission="admin.access.user.reactivate"
        >
            @lang('Reactivate')
        </x-utils.form-button>
    @endif

    @if ($user->id !== $logged_in_user->id && !$user->isMasterAdmin() && $logged_in_user->hasAllAccess())
        <x-utils.delete-button :href="route('admin.auth.user.destroy', $user)" />
    @endif

    {{-- The logged in user is the master admin, and the row is the master admin. Only the master admin can do anything to themselves --}}
    @if ($user->isMasterAdmin() && $logged_in_user->isMasterAdmin())
        <div class="dropdown d-inline-block">
            <a class="btn btn-sm btn-secondary dropdown-toggle" id="moreMenuLink" href="#" role="button" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">
                @lang('More')
            </a>

            <div class="dropdown-menu" aria-labelledby="moreMenuLink">
                <x-utils.link
                    :href="route('admin.auth.user.change-password', $user)"
                    class="dropdown-item"
                    :text="__('Change Password')"
                    permission="admin.access.user.change-password" />
            </div>
        </div>
    @elseif (
        !$user->isMasterAdmin() && // This is not the master admin
        $user->isActive() && // The account is active
        $user->id !== $logged_in_user->id && // It's not the person logged in
        // Any they have at lease one of the abilities in this dropdown
        (
            $logged_in_user->can('admin.access.user.change-password') ||
            $logged_in_user->can('admin.access.user.clear-session') ||
            $logged_in_user->can('admin.access.user.impersonate') ||
            $logged_in_user->can('admin.access.user.deactivate')
        )
    )
        <div class="dropdown d-inline-block">
            <a class="btn btn-sm btn-secondary dropdown-toggle" id="moreMenuLink" href="#" role="button" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">
                @lang('More')
            </a>

            <div class="dropdown-menu" aria-labelledby="moreMenuLink">
                <x-utils.link
                    :href="route('admin.auth.user.change-password', $user)"
                    class="dropdown-item"
                    :text="__('Change Password')"
                    permission="admin.access.user.change-password" />

                @if ($user->id !== $logged_in_user->id && !$user->isMasterAdmin())
                    <x-utils.form-button
                        :action="route('admin.auth.user.clear-session', $user)"
                        name="confirm-item"
                        button-class="dropdown-item"
                        permission="admin.access.user.clear-session"
                    >
                        @lang('Clear Session')
                    </x-utils.form-button>

                    @canBeImpersonated($user)
                        <x-utils.link
                            :href="route('impersonate', $user->id)"
                            class="dropdown-item"
                            :text="__('Login As ' . $user->name)"
                            permission="admin.access.user.impersonate" />
                    @endCanBeImpersonated

                    <x-utils.form-button
                        :action="route('admin.auth.user.mark', [$user, 0])"
                        method="patch"
                        name="confirm-item"
                        button-class="dropdown-item"
                        permission="admin.access.user.deactivate"
                    >
                        @lang('Deactivate')
                    </x-utils.form-button>
                @endif
            </div>
        </div>
    @endif
@endif
