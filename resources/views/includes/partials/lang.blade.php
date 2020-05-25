<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLanguageLink">
    @foreach(config('boilerplate.locale.languages') as $code => $details)
        @if($code !== app()->getLocale())
            <x-utils.link class="dropdown-item pt-1 pb-1" :href="route('locale.change', $code)" :text="__(getLocaleName($code))" />
        @endif
    @endforeach
</div><!--dropdown-menu-->
