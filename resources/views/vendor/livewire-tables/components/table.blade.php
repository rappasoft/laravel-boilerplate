@aware(['component'])

@php
    $theme = $component->getTheme();

    $customAttributes = [
        'wrapper' => $this->getTableWrapperAttributes(),
        'table' => $this->getTableAttributes(),
        'thead' => $this->getTheadAttributes(),
        'tbody' => $this->getTbodyAttributes(),
    ];
@endphp

@if ($theme === 'tailwind')
    <div {{
        $attributes->merge($customAttributes['wrapper'])
            ->class(['shadow overflow-y-scroll border-b border-gray-200 dark:border-gray-700 sm:rounded-lg' => $customAttributes['wrapper']['default'] ?? true])
            ->except('default')
    }}>
        <table {{
            $attributes->merge($customAttributes['table'])
                ->class(['min-w-full divide-y divide-gray-200 dark:divide-none' => $customAttributes['table']['default'] ?? true])
                ->except('default')
        }}>
            <thead {{
                $attributes->merge($customAttributes['thead'])
                    ->class(['bg-gray-50' => $customAttributes['thead']['default'] ?? true])
                    ->except('default')
            }}>
                <tr>
                    {{ $thead }}
                </tr>
            </thead>
            <tbody
                @if ($component->reorderIsEnabled())
                    wire:sortable="{{ $component->getReorderMethod() }}"
                @endif

                {{
                    $attributes->merge($customAttributes['tbody'])
                        ->class(['bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-none' => $customAttributes['tbody']['default'] ?? true])
                        ->except('default')
                }}
            >
                {{ $slot }}
            </tbody>

            @if (isset($tfoot))
                <tfoot>
                    {{ $tfoot }}
                </tfoot>
            @endif
        </table>
    </div>
@elseif ($theme === 'bootstrap-4' || $theme === 'bootstrap-5')
    <div {{ 
        $attributes->merge($customAttributes['wrapper'])
            ->class(['table-responsive' => $customAttributes['wrapper']['default'] ?? true])
            ->except('default')
    }}>
        <table {{
            $attributes->merge($customAttributes['table'])
                ->class(['table table-striped' => $customAttributes['table']['default'] ?? true])
                ->except('default')
        }}>
            <thead {{
                $attributes->merge($customAttributes['thead'])
                    ->class(['' => $customAttributes['thead']['default'] ?? true])
                    ->except('default')
            }}>
                <tr>
                    {{ $thead }}
                </tr>
            </thead>

            <tbody
                @if ($component->reorderIsEnabled())
                    wire:sortable="{{ $component->getReorderMethod() }}"
                @endif

                {{
                    $attributes->merge($customAttributes['tbody'])
                        ->class(['' => $customAttributes['tbody']['default'] ?? true])
                        ->except('default')
                }}
            >
                {{ $slot }}
            </tbody>

            @if (isset($tfoot))
                <tfoot>
                    {{ $tfoot }}
                </tfoot>
            @endif
        </table>
    </div>
@endif
