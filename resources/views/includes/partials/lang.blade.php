<ul class="dropdown-menu" role="menu">
    @foreach (array_keys(config('locale.languages')) as $lang)
        @if ($lang != App::getLocale())
            <li>{{ link_to('lang/'.$lang, __('menus.language-picker.langs.'.$lang)) }}</li>
        @endif
    @endforeach
</ul>