<footer class="c-footer">
    <div>
        <strong>
            {{ __('Copyright') }} &copy; {{ date('Y') }}
            <x-utils.link href="http://laravel-boilerplate.com" target="_blank" text="Laravel Boilerplate" />
        </strong>

        {{ __('All Rights Reserved') }}
    </div>

    <div class="mfs-auto">
        {{ __('Powered by') }}
        <x-utils.link href="http://laravel-boilerplate.com" target="_blank" :text="__('Laravel Boilerplate')" /> &
        <x-utils.link href="https://coreui.io" target="_blank" text="CoreUI" />
</footer>
