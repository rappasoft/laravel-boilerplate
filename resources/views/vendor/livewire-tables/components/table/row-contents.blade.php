@aware(['component'])
@props(['row', 'rowIndex'])

@if ($component->collapsingColumnsAreEnabled() && $component->hasCollapsedColumns())
    @php
        $theme = $component->getTheme();
        $columns = collect([]);

        if ($component->shouldCollapseOnMobile() && $component->shouldCollapseOnTablet()) {
            $columns->push($component->getCollapsedMobileColumns());
            $columns->push($component->getCollapsedTabletColumns());
        } elseif ($component->shouldCollapseOnTablet() && ! $component->shouldCollapseOnMobile()) {
            $columns->push($component->getCollapsedTabletColumns());
        } elseif ($component->shouldCollapseOnMobile() && ! $component->shouldCollapseOnTablet()) {
            $columns->push($component->getCollapsedMobileColumns());
        }

        $columns = $columns->collapse();

        // TODO: Column count
        $colspan = $columns->count() + 1;
    @endphp

    @if ($theme === 'tailwind')
        <tr
            wire:key="row-{{ $rowIndex }}-collapsed-contents"
            wire:loading.class.delay="opacity-50 dark:bg-gray-900 dark:opacity-60"
            x-data
            @toggle-row-content.window="$event.detail.row === {{ $rowIndex }} ? $el.classList.toggle('hidden') : null"
            class="hidden md:hidden bg-white dark:bg-gray-700 dark:text-white"
        >
            <td class="pt-4 pb-2 px-4" colspan="{{ $colspan }}">
                <div>
                    @foreach($columns as $colIndex => $column)
                        @continue($column->isHidden())
                        @continue($this->columnSelectIsEnabled() && ! $this->columnSelectIsEnabledForColumn($column))
                        
                        <p class="block mb-2 @if($column->shouldCollapseOnMobile()) sm:hidden @endif @if($column->shouldCollapseOnTablet()) md:hidden @endif">
                            <strong>{{ $column->getTitle() }}</strong>: {{ $column->renderContents($row) }}
                        </p>
                    @endforeach
                </div>
            </td>
        </tr>
    @elseif ($theme === 'bootstrap-4' || $theme === 'bootstrap-5')
        <tr
            wire:key="row-{{ $rowIndex }}-collapsed-contents"
            x-data
            @toggle-row-content.window="$event.detail.row === {{ $rowIndex }} ? $el.classList.toggle('d-none') : null"
            class="d-none d-md-none"
        >
            <td class="pt-3 p-2" colspan="{{ $colspan }}">
                <div>
                    @foreach($columns as $colIndex => $column)
                        @continue($column->isHidden())
                        @continue($this->columnSelectIsEnabled() && ! $this->columnSelectIsEnabledForColumn($column))
                        
                        <p class="d-block mb-2 @if($column->shouldCollapseOnMobile()) d-sm-none @endif @if($column->shouldCollapseOnTablet()) d-md-none @endif">
                            <strong>{{ $column->getTitle() }}</strong>: {{ $column->renderContents($row) }}
                        </p>
                    @endforeach
                </div>
            </td>
        </tr>
    @endif
@endif
