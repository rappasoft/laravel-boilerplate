@props([
    'for' => '',
    'label' => '',
    'noLabel' => false,
    'groupClass' => 'form-group row',
    'labelClass' => 'col-md-2 col-form-label',
    'bodyClass' => 'col-md-10'
])

<div class="{{ $groupClass }}">
    @if ($noLabel === false)
        <label for="{{ $for }}" class="{{ $labelClass }}">{{ $label }}</label>
    @endif

    <div class="{{ $bodyClass }}">
        {{ $slot }}
    </div>
</div>
