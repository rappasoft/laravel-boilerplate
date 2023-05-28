@if ($example->trashed() && $logged_in_user->hasAllAccess())
    <x-utils.form-button
        :action="route('admin.auth.example.restore', $example)"
        method="patch"
        button-class="btn btn-info btn-sm"
        icon="fas fa-sync-alt"
        name="confirm-item"
    >
        @lang('Restore')
    </x-utils.form-button>

    <x-utils.delete-button
        :href="route('admin.auth.example.permanently-delete', $example)"
        :text="__('Permanently Delete')"/>
@else
    @if ($logged_in_user->hasAllAccess())
        <x-utils.view-button :href="route('admin.auth.example.show', $example)"/>
        <x-utils.edit-button :href="route('admin.auth.example.edit', $example)"/>
    @endif


    <x-utils.delete-button :href="route('admin.auth.example.destroy', $example)"/>
@endif
