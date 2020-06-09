<x-utils.link
    class="c-subheader-nav-link"
    :href="route('admin.auth.user.deactivated')"
    :text="__('Deactivated Users')"
    permission="access.users.reactivate" />

@if ($logged_in_user->isAdmin())
    <x-utils.link class="c-subheader-nav-link" :href="route('admin.auth.user.deleted')" :text="__('Deleted Users')" />
@endif
