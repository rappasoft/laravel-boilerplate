@if (isset($permission))
    @if ($logged_in_user->can($permission))
        <x-utils.form-button
            :action="$href"
            method="delete"
            name="delete-item"
            button-class="btn btn-danger btn-sm"
        >
            <i class="fas fa-trash"></i> {{ $text ?? __('Delete') }}
        </x-utils.form-button>
    @endif
@else
    <x-utils.form-button
        :action="$href"
        method="delete"
        name="delete-item"
        button-class="btn btn-danger btn-sm"
    >
        <i class="fas fa-trash"></i> {{ $text ?? __('Delete') }}
    </x-utils.form-button>
@endif
