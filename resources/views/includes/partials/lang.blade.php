<div class="dropdown-menu" aria-labelledby="navbarDropdownLanguageLink">
    @foreach (array_keys(config('locale.languages')) as $lang)
        @if ($lang != app()->getLocale())
            <a href="{{ '/lang/'.$lang }}" class="dropdown-item">{{ __('menus.language-picker.langs.'.$lang) }}</a>
        @endif
    @endforeach
</div>