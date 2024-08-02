@aware(['component'])

@php
    $theme = $component->getTheme();
@endphp

@if ($theme === 'tailwind')
    <div class="flex-col">
        {{ $slot }}
    </div>
@elseif ($theme === 'bootstrap-4' || $theme === 'bootstrap-5')
    <div class="d-flex flex-column">
        {{ $slot }}
    </div>
@endif
