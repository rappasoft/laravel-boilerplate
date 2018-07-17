@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.tabs.titles.history'))

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.access.users.tabs.titles.history') }}
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    @if (count($history_types))
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach ($history_types as $index => $history_type)
                                @php
                                    $id = explode('\\', $history_type);
                                    $id = end($id);
                                @endphp

                                <li class="nav-item">
                                    <a class="nav-link {{ $index === 0 ? 'active' : '' }}" data-toggle="tab" href="#entity_{{ $id }}" role="tab" aria-controls="entity_{{ $id }}" aria-selected="true">{{ camelcase_to_word($id) }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach ($history_types as $index => $history_type)
                                @php
                                    $id = explode('\\', $history_type);
                                    $id = end($id);
                                @endphp

                                <div class="tab-pane {{ $index === 0 ? 'active show' : '' }}" id="entity_{{ $id }}" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="history-{{ str_replace('\\', '_', $history_type) }}" class="table table-condensed table-bordered table-hover mb-0" style="width:100% !important;">
                                            <thead>
                                            <tr>
                                                <th>Modified By</th>
                                                <th>Event</th>
                                                <th>Entity Modified</th>
                                                <th>What Changed</th>
                                                <th>When</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if (count(${str_replace('\\', '_', $history_type)}))
                                                @foreach (${str_replace('\\', '_', $history_type)} as $type)
                                                    <tr>
                                                        <td>{{ $type->user ? $type->user->full_name : 'N/A' }}</td>
                                                        <td>{{ ucfirst($type->event) }}</td>
                                                        <td>{{ $type->auditable ? $type->auditable->auditable_label : 'N/A' }}</td>
                                                        <td>
                                                            @php
                                                                $modified = $type->getModified();

                                                                if (count($modified)) {
                                                                    echo "<table class='table table-condensed'>";
                                                                    echo "<thead>";
                                                                    echo "<tr>";
                                                                    echo "<th>Column</th>";
                                                                    echo "<th>Before</th>";
                                                                    echo "<th>After</th>";
                                                                    echo "</tr>";
                                                                    echo "</thead>";

                                                                    foreach ($modified as $name => $m) {
                                                                        echo "<tr>";

                                                                        echo "<td>".$name."</td>";

                                                                        echo "<td>";
                                                                            if (isset($m['old'])) {
                                                                                echo $m['old'];
                                                                            } else {
                                                                                echo "N/A";
                                                                            }
                                                                        echo "</td>";

                                                                        echo "<td>";
                                                                            if (isset($m['new'])) {
                                                                                echo $m['new'];
                                                                            } else {
                                                                                echo "N/A";
                                                                            }
                                                                        echo "</td>";

                                                                        echo "</tr>";
                                                                    }

                                                                    echo "</table>";
                                                                } else {
                                                                    echo 'Nothing';
                                                                }
                                                            @endphp
                                                        </td>
                                                        <td>{{ $type->created_at->timezone(get_user_timezone()) }} ({{ $type->created_at->diffForHumans() }})</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="8">There is no history for this entity.</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>

                                        {!!  ${str_replace('\\', '_', $history_type)}->render() !!}
                                    </div><!--table-responsive-->
                                </div><!--tab-->
                            @endforeach
                        </div>
                    @else
                        <p>There is no history.</p>
                    @endif
                </div>
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
