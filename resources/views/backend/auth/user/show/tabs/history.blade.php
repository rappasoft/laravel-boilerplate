<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Description</th>
                <th>Changes</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            @if ($activity->count())
                @foreach ($activity as $log)
                    <tr>
                        <td>{{ $log->description }}</td>
                        <td>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Old</th>
                                        <th>New</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            @foreach($log->changes()['old'] as $name => $value)
                                                {{ $name }}: {{ $value }}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($log->changes()['attributes'] as $name => $value)
                                                {{ $name }}: {{ $value }}
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td>{{ $log->created_at }}<br><small>({{ $log->created_at->diffForHumans() }})</small></td>
                    </tr>
                @endforeach
            @else
                <tr><td colspan="3">No recent activity.</td></tr>
            @endif
        </tbody>
    </table>

    <div class="pull-left">
        {!! $activity->total() !!} item(s)
    </div>

    <div class="pull-right">
        {!! $activity->render() !!}
    </div>

    <div class="clearfix"></div>
</div><!--table-responsive-->