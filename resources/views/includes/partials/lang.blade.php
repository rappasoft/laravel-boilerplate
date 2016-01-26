<ul class="dropdown-menu" role="menu">
    {{--
    * Add the link to the new language.
    * Use the same language code as the folder name.
    * Be sure to add the new link in alphabetical order.
    --}}
    <li>{!! link_to('lang/de', trans('menus.language-picker.langs.de')) !!}</li>
    <li>{!! link_to('lang/en', trans('menus.language-picker.langs.en')) !!}</li>
    <li>{!! link_to('lang/es', trans('menus.language-picker.langs.es')) !!}</li>
    <li>{!! link_to('lang/fr', trans('menus.language-picker.langs.fr')) !!}</li>
    <li>{!! link_to('lang/it', trans('menus.language-picker.langs.it')) !!}</li>
    <li>{!! link_to('lang/pt-BR', trans('menus.language-picker.langs.pt-BR')) !!}</li>
    <li>{!! link_to('lang/sv', trans('menus.language-picker.langs.sv')) !!}</li>
</ul>
