@if ($component->offlineIndicatorIsEnabled())
    @if ($theme === 'tailwind')
        <div wire:offline.class.remove="hidden" class="hidden">
            <div class="rounded-md bg-red-100 p-4 mb-4 dark:border-red-800 dark:bg-red-500">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400 dark:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800 dark:text-white">
                            @lang('You are not connected to the internet.')
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    @elseif ($theme === 'bootstrap-4' || $theme === 'bootstrap-5')
        <div wire:offline.class.remove="d-none" class="d-none">
            <div class="alert alert-danger d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:1.3em;height:1.3em;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

                <span class="d-inline-block ml-2">@lang('You are not connected to the internet.')</span>
            </div>
        </div>
    @endif
@endif
