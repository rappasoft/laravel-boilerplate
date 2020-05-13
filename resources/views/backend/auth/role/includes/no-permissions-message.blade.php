@if ($general->count() + $categories->count() === 0)
    <x-utils.alert type="warning" class="mb-0" :dismissable="false">
        <i class="fa fa-info-circle"></i> {{ __('There are no permissions to choose from.') }}
    </x-utils.alert>
@endif
