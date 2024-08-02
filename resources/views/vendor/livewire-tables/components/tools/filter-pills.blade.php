@aware(['component'])

@php
    $theme = $component->getTheme();
@endphp

@if ($theme === 'tailwind')
    <div>
        @if ($component->filtersAreEnabled() && $component->filterPillsAreEnabled() && $component->hasAppliedVisibleFiltersForPills())
            <div class="mb-4 px-4 md:p-0">
                <small class="text-gray-700 dark:text-white">@lang('Applied Filters'):</small>

                @foreach($component->getAppliedFiltersWithValues() as $filterSelectName => $value)
                    @php
                        $filter = $component->getFilterByKey($filterSelectName);
                    @endphp

                    @continue(is_null($filter))
                    @continue($filter->isHiddenFromPills())
                    @if ($filter->hasCustomPillBlade())
                        @include($filter->getCustomPillBlade(), ['filter' => $filter])
                    @else
                        <span
                            wire:key="{{ $component->getTableName() }}-filter-pill-{{ $filter->getKey() }}"
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-indigo-100 text-indigo-800 capitalize dark:bg-indigo-200 dark:text-indigo-900"
                        >
                            {{ $filter->getFilterPillTitle() }}: {{ $filter->getFilterPillValue($value) }}

                            <button
                                wire:click="resetFilter('{{ $filter->getKey() }}')"
                                type="button"
                                class="flex-shrink-0 ml-0.5 h-4 w-4 rounded-full inline-flex items-center justify-center text-indigo-400 hover:bg-indigo-200 hover:text-indigo-500 focus:outline-none focus:bg-indigo-500 focus:text-white"
                            >
                                <span class="sr-only">@lang('Remove filter option')</span>
                                <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                    <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                                </svg>
                            </button>
                        </span>
                    @endif
                @endforeach

                <button
                    wire:click.prevent="setFilterDefaults"
                    class="focus:outline-none active:outline-none"
                >
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-200 dark:text-gray-900">
                        @lang('Clear')
                    </span>
                </button>
            </div>
        @endif
    </div>
@elseif ($theme === 'bootstrap-4')
    <div>
        @if ($component->filtersAreEnabled() && $component->filterPillsAreEnabled() && $component->hasAppliedVisibleFiltersForPills())
            <div class="mb-3">
                <small>@lang('Applied Filters'):</small>

                @foreach($component->getAppliedFiltersWithValues() as $filterSelectName => $value)
                    @php
                        $filter = $component->getFilterByKey($filterSelectName);
                    @endphp

                    @continue(is_null($filter))
                    @continue($filter->isHiddenFromPills())
                    @if ($filter->hasCustomPillBlade())
                        @include($filter->getCustomPillBlade(), ['filter' => $filter])
                    @else
                    <span
                        wire:key="{{ $component->getTableName() }}-filter-pill-{{ $filter->getKey() }}"
                        class="badge badge-pill badge-info d-inline-flex align-items-center"
                    >
                        {{ $filter->getFilterPillTitle() }}: {{ $filter->getFilterPillValue($value) }}

                        <a
                            href="#"
                            wire:click="resetFilter('{{ $filter->getKey() }}')"
                            class="text-white ml-2"
                        >
                            <span class="sr-only">@lang('Remove filter option')</span>
                            <svg style="width:.5em;height:.5em" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                            </svg>
                        </a>
                    </span>
                    @endif
                @endforeach

                <a
                    href="#"
                    wire:click.prevent="setFilterDefaults"
                    class="badge badge-pill badge-light"
                >
                    @lang('Clear')
                </a>
            </div>
        @endif
    </div>
@elseif ($theme === 'bootstrap-5')
    <div>
        @if ($component->filtersAreEnabled() && $component->filterPillsAreEnabled() && $component->hasAppliedVisibleFiltersForPills())
            <div class="mb-3">
                <small>@lang('Applied Filters'):</small>

                @foreach($component->getAppliedFiltersWithValues() as $filterSelectName => $value)
                    @php
                        $filter = $component->getFilterByKey($filterSelectName);
                    @endphp

                    @continue(is_null($filter))
                    @continue($filter->isHiddenFromPills())

                    @if ($filter->hasCustomPillBlade())
                        @include($filter->getCustomPillBlade(), ['filter' => $filter])
                    @else
                    <span
                        wire:key="{{ $component->getTableName() }}-filter-pill-{{ $filter->getKey() }}"
                        class="badge rounded-pill bg-info d-inline-flex align-items-center"
                    >
                        {{ $filter->getFilterPillTitle() }}: {{ $filter->getFilterPillValue($value) }}

                        <a
                            href="#"
                            wire:click="resetFilter('{{ $filter->getKey() }}')"
                            class="text-white ms-2"
                        >
                            <span class="visually-hidden">@lang('Remove filter option')</span>
                            <svg style="width:.5em;height:.5em" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                            </svg>
                        </a>
                    </span>
                    @endif
                @endforeach

                <a
                    href="#"
                    wire:click.prevent="setFilterDefaults"
                    class="badge rounded-pill bg-light text-dark text-decoration-none"
                >
                    @lang('Clear')
                </a>
            </div>
        @endif
    </div>
@endif
