<div>
    @if ($component->debugIsEnabled())
        @php
            $debuggable = [
                'query' => $component->getQuerySql(),
                'filters' => $component->getAppliedFilters(),
                'sorts' => $component->getSorts(),
                'search' => $component->getSearch(),
                'select-all' => $component->getSelectAllStatus(),
                'selected' => $component->getSelected(),
            ];
        @endphp

        <p><strong>@lang('Debugging Values'):</strong></p>

        @if (! app()->runningInConsole())
            <div class="mb-4">@dump($debuggable)</div>
        @endif
    @endif
</div>
