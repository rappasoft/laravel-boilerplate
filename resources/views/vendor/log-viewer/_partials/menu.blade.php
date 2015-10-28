<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-fw fa-flag"></i> Levels</div>
    <ul class="list-group">
        @foreach($log->menu() as $level => $item)
            @if ($item['count'] === 0)
                <a href="#" class="list-group-item disabled">
                    <span class="badge">
                        {{ $item['count'] }}
                    </span>
                    {!! $item['icon'] !!} {{ $item['name'] }}
                </a>
            @else
                <a href="{{ $item['url'] }}" class="list-group-item {{ $level }}">
                    <span class="badge level-{{ $level }}">
                        {{ $item['count'] }}
                    </span>
                    <span class="level level-{{ $level }}">
                        {!! $item['icon'] !!} {{ $item['name'] }}
                    </span>
                </a>
            @endif
        @endforeach
    </ul>
</div>
