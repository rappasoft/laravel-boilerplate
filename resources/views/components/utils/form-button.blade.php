@props([
    'action' => '#',
    'method' => 'POST',
    'name' => '',
    'formClass' => 'd-inline',
    'buttonClass' => '',
    'icon' => false,
    'permission' => false,
])

@if ($permission)
    @if ($logged_in_user->can($permission))
        <form method="POST" action="{{ $action }}" name="{{ $name }}" class="{{ $formClass }}">
            @csrf
            @method($method)

            <button type="submit" class="{{ $buttonClass }}">
                @if ($icon)<i class="{{ $icon }}"></i> @endif{{ $slot }}
            </button>
        </form>
    @endif
@else
    <form method="POST" action="{{ $action }}" name="{{ $name }}" class="{{ $formClass }}">
        @csrf
        @method($method)

        <button type="submit" class="{{ $buttonClass }}">
            @if ($icon)<i class="{{ $icon }}"></i> @endif{{ $slot }}
        </button>
    </form>
@endif
