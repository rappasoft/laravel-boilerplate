<div class="card">
    <div class="card-header">
        <i class="fa fa-fw fa-flag"></i> Levels
    </div>
    <ul class="list-group list-group-flush">
        @foreach($log->menu() as $level => $item)
            @if($item['count'] === 0)
                <a class="list-group-item disabled">
                    <span class="badge level level-none">
                        {!! $item['icon'] !!} {{ $item['name'] }}
                    </span>
                </a>
            @else
                <a href="{{ $item['url'] }}" class="list-group-item {{ $level }}">
                    <span class="badge level level-{{ $level }} float-left">
                        {!! $item['icon'] !!} {{ $item['name'] }}
                    </span>
                    <span class="badge badge-pill level level-{{ $level }} float-right">
                        {{ $item['count'] }}
                    </span>
                </a>
            @endif
        @endforeach
    </ul>
</div>
