
@if ($logged_in_user->hasAllAccess())
    <x-utils.link class="c-subheader-nav-link" :href="route('admin.auth.example.deleted')" :text="__('Deleted Examples')" />
@endif
