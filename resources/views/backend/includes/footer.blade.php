<footer class="app-footer">
    <span class="float-left">
        <strong>{{ __('labels.general.copyright') }} &copy; {{ date('Y') }} <a href="http://laravel-boilerplate.com">{{ __('strings.backend.general.boilerplate_link') }}</a></strong> {{ __('strings.backend.general.all_rights_reserved') }}
    </span>

    <span class="ml-auto">
        Powered by <a href="http://coreui.io">CoreUI</a>

        @if (config('boilerplate.show-load-time'))
            <small>(Page generated in {{ round((microtime(true) - LARAVEL_START), 5) }} seconds)</small>
        @endif
    </span>

    <div class="clearfix"></div>
</footer>