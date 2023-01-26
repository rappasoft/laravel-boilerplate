<div {{ $attributes->class("card mb-5") }}>
    @if (isset($header))
        <div {{ $header->attributes->class('card-header h6 d-table') }}>
            <div class="d-table-cell align-middle px-2 py-2">
                {{ $header }}
            </div>
            @if (isset($headerActions))
                <div {{ $headerActions->attributes->class('d-table-cell align-middle text-end') }}>
                    {{ $headerActions }}
                </div><!--card-header-actions-->
            @endif
        </div><!--card-header-->
    @endif

    @if (isset($body))
        <div {{ $body->attributes->class("card-body pt-4 pb-4") }}>
            {{ $body }}
        </div><!--card-body-->
    @endif

    @if (isset($footer))
        <div {{ $footer->attributes->class("card-footer p-3") }}>
            {{ $footer }}
        </div><!--card-footer-->
    @endif
</div><!--card-->

