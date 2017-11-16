<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLanguageLink">
    @foreach (array_keys(config('locale.languages')) as $lang)
        @if ($lang != app()->getLocale())
            <small><a href="{{ '/lang/'.$lang }}" class="dropdown-item">{{ __('menus.language-picker.langs.'.$lang) }}</a></small>
        @endif
    @endforeach
</div>
