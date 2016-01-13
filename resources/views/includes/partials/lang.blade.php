<ul class="dropdown-menu" role="menu">
    {{--
    * Add the link the new language. Use the same language code as the folder name.
    * Be sure to add the new link in alphabetical order.
    --}}
    <li>{!! link_to('lang/en', trans('menus.language-picker.langs.en')) !!}</li>
    <li>{!! link_to('lang/fr-FR', trans('menus.language-picker.langs.fr-FR')) !!}</li>
    <li>{!! link_to('lang/it', trans('menus.language-picker.langs.it')) !!}</li>
    <li>{!! link_to('lang/sv', trans('menus.language-picker.langs.sv')) !!}</li>
</ul>
