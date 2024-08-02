@php
    $theme = $component->getTheme();
    $filterLayout = $component->getFilterLayout();
    $tableName = $component->getTableName();
@endphp
<div>
    @if($filter->hasCustomFilterLabel() && !$filter->hasCustomPosition())
        @include($filter->getCustomFilterLabel(),['filter' => $filter, 'theme' => $theme, 'filterLayout' => $filterLayout, 'tableName' => $tableName  ])
    @elseif(!$filter->hasCustomPosition())
        <x-livewire-tables::tools.filter-label :filter="$filter" :theme="$theme" :filterLayout="$filterLayout" :tableName="$tableName" />
    @endif

    @if ($theme === 'tailwind')
        <div class="rounded-md shadow-sm">
            <input
                wire:model.stop="{{ $tableName }}.filters.{{ $filter->getKey() }}"
                wire:key="{{ $tableName }}-filter-{{ $filter->getKey() }}@if($filter->hasCustomPosition())-{{ $filter->getCustomPosition() }}@endif"
                id="{{ $tableName }}-filter-{{ $filter->getKey() }}@if($filter->hasCustomPosition())-{{ $filter->getCustomPosition() }}@endif"
                type="date"
                @if($filter->hasConfig('min')) min="{{ $filter->getConfig('min') }}" @endif
                @if($filter->hasConfig('max')) max="{{ $filter->getConfig('max') }}" @endif
                class="block w-full border-gray-300 rounded-md shadow-sm transition duration-150 ease-in-out focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-800 dark:text-white dark:border-gray-600"
            />
        </div>
    @elseif ($theme === 'bootstrap-4' || $theme === 'bootstrap-5')
        <div class="mb-3 mb-md-0 input-group">
            <input
                wire:model.stop="{{ $tableName }}.filters.{{ $filter->getKey() }}"
                wire:key="{{ $tableName }}-filter-{{ $filter->getKey() }}@if($filter->hasCustomPosition())-{{ $filter->getCustomPosition() }}@endif"
                id="{{ $tableName }}-filter-{{ $filter->getKey() }}@if($filter->hasCustomPosition())-{{ $filter->getCustomPosition() }}@endif"
                type="date"
                @if($filter->hasConfig('min')) min="{{ $filter->getConfig('min') }}" @endif
                @if($filter->hasConfig('max')) max="{{ $filter->getConfig('max') }}" @endif
                class="form-control"
            />
        </div>
    @endif
</div>
