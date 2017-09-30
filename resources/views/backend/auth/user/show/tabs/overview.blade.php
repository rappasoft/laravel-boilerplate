<div class="table-responsive">
    <table class="table table-striped table-hover">
        <tr>
            <th>{{ __('labels.backend.access.users.tabs.content.overview.avatar') }}</th>
            <td><img src="{{ $user->picture }}" class="user-profile-image" /></td>
        </tr>

        <tr>
            <th>{{ __('labels.backend.access.users.tabs.content.overview.name') }}</th>
            <td>{{ $user->name }}</td>
        </tr>

        <tr>
            <th>{{ __('labels.backend.access.users.tabs.content.overview.email') }}</th>
            <td>{{ $user->email }}</td>
        </tr>

        <tr>
            <th>{{ __('labels.backend.access.users.tabs.content.overview.status') }}</th>
            <td>{!! $user->status_label !!}</td>
        </tr>

        <tr>
            <th>{{ __('labels.backend.access.users.tabs.content.overview.confirmed') }}</th>
            <td>{!! $user->confirmed_label !!}</td>
        </tr>

        <tr>
            <th>{{ __('labels.backend.access.users.tabs.content.overview.created_at') }}</th>
            <td>{{ $user->created_at }}<br><small>({{ $user->created_at->diffForHumans() }})</small></td>
        </tr>

        <tr>
            <th>{{ __('labels.backend.access.users.tabs.content.overview.last_updated') }}</th>
            <td>{{ $user->updated_at }}<br/><small>({{ $user->updated_at->diffForHumans() }})</small></td>
        </tr>

        @if ($user->trashed())
            <tr>
                <th>{{ __('labels.backend.access.users.tabs.content.overview.deleted_at') }}</th>
                <td>{{ $user->deleted_at }}<br/><small>({{ $user->deleted_at->diffForHumans() }})</small></td>
            </tr>
        @endif
    </table>
</div><!--table-responsive-->