<div class="card">
    @if (isset($header))
        <div class="card-header">
            {{ $header }}

            @if (isset($headerActions))
                <div class="card-header-actions">
                    {{ $headerActions }}
                </div>
            @endif
        </div>
    @endif

    @if (isset($body))
        <div class="card-body">
            {{ $body }}
        </div>
    @endif

    @if (isset($footer))
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>
