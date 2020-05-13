@if (isset($permission))
    @if ($logged_in_user->can($permission))
        <x-utils.link :href="$href" class="btn btn-primary btn-sm" icon="fas fa-pencil-alt" :text="__('Edit')" />
    @endif
@else
    <x-utils.link :href="$href" class="btn btn-primary btn-sm" icon="fas fa-pencil-alt" :text="__('Edit')" />
@endif
