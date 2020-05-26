@if (isset($permission))
    @if ($logged_in_user->can($permission))
        <x-utils.link :href="$href" class="btn btn-info btn-sm" icon="fas fa-search" :text="__('View')" />
    @endif
@else
    <x-utils.link :href="$href" class="btn btn-info btn-sm" icon="fas fa-search" :text="__('View')" />
@endif
