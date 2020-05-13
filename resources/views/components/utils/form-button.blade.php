<form method="POST" action="{{ $action }}" name="{{ $name ?? '' }}" class="{{ $formClass ?? 'd-inline' }}">
    @csrf
    @method($method ?? 'POST')

    <button type="submit" class="{{ $buttonClass ?? '' }}">
        {{ $slot }}
    </button>
</form>
