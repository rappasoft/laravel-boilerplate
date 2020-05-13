<div class="card">
    @if (isset($header))
        <div class="card-header">
            {{ $header }}
        </div><!--card-header-->
    @endif

    @if (isset($body))
        <div class="card-body">
            {{ $body }}
        </div><!--card-body-->
    @endif

    @if (isset($footer))
        <div class="card-footer">
            {{ $footer }}
        </div><!--card-footer-->
    @endif
</div><!--card-->
