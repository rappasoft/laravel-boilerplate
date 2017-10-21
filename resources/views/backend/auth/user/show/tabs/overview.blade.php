<table class="table table-hover table-responsive">
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
</table>
