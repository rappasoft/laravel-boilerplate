@aware(['component'])

@if ($component->collapsingColumnsAreEnabled() && $component->hasCollapsedColumns())
    @php
        $theme = $component->getTheme();
    @endphp

    @if ($theme === 'tailwind')
        <th
            scope="col"
            {{
                $attributes
                    ->merge(['class' => 'table-cell dark:bg-gray-800'])
                    ->class([
                        'md:hidden' =>
                            (($component->shouldCollapseOnMobile() && $component->shouldCollapseOnTablet()) ||
                            ($component->shouldCollapseOnTablet() && ! $component->shouldCollapseOnMobile()))
                    ])
                    ->class(['sm:hidden' => $component->shouldCollapseOnMobile() && ! $component->shouldCollapseOnTablet()])
            }}
        ></th>
    @elseif ($theme === 'bootstrap-4' || $theme === 'bootstrap-5')
        <th
            scope="col"
            {{
                $attributes
                    ->merge(['class' => 'd-table-cell'])
                    ->class([
                        'd-md-none' =>
                            (($component->shouldCollapseOnMobile() && $component->shouldCollapseOnTablet()) ||
                            ($component->shouldCollapseOnTablet() && ! $component->shouldCollapseOnMobile()))
                    ])
                    ->class(['d-sm-none' => $component->shouldCollapseOnMobile() && ! $component->shouldCollapseOnTablet()])
            }}
        ></th>
    @endif
@endif
