<footer class="c-footer">
    <div>
        <strong>
            @lang('Copyright') &copy; {{ date('Y') }}
            <x-utils.link href="http://laravel-boilerplate.com" target="_blank" text="Laravel Boilerplate" />
        </strong>

        @lang('All Rights Reserved')
    </div>

    <div class="mfs-auto">
        @lang('Powered by')
        <x-utils.link href="http://laravel-boilerplate.com" target="_blank" :text="__('Laravel Boilerplate')" /> &
        <x-utils.link href="https://coreui.io" target="_blank" text="CoreUI" />
    </div>
</footer>
