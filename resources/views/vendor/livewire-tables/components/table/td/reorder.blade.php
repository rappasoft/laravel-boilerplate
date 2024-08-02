@aware(['component'])

@php
    $theme = $component->getTheme();
@endphp

@if ($this->currentlyReorderingIsEnabled())
    @if ($theme === 'tailwind')
        <x-livewire-tables::table.td.plain wire:sortable.handle>
            <svg xmlns="http://www.w3.org/2000/svg" class="inline w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </x-livewire-tables::table.td.plain>
    @elseif ($theme === 'bootstrap-4' || $theme === 'bootstrap-5')
        <x-livewire-tables::table.td.plain wire:sortable.handle>
            <svg xmlns="http://www.w3.org/2000/svg" class="d-inline" style="width:1em;height:1em;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </x-livewire-tables::table.td.plain>
    @endif
@endif
