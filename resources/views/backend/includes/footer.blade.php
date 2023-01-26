<footer class="footer d-print-none">
    <div>
        <strong>
            @lang('Copyright') &copy; {{ date('Y') }}
            <x-utils.link href="/" target="_blank" :text="__(appName())"/>
        </strong>

        @lang('All Rights Reserved')
    </div>

    <div class="ms-auto">
        @lang('Powered by')
        <x-utils.link href="/" target="_blank" :text="__(appName())"/>
    </div>
</footer>
