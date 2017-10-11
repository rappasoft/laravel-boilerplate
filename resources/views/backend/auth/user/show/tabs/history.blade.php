<table class="table table-responsive">
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
                        @if (isset($log->changes()['old']) && count($log->changes()['old']))
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
                                                <strong>{{ $name }}:</strong> {{ $value }}<br/>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($log->changes()['attributes'] as $name => $value)
                                                <strong>{{ $name }}:</strong> {{ $value }}<br/>
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <em>None</em>
                        @endif
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
