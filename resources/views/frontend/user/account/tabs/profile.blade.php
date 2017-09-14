<table class="table table-striped table-hover table-bordered">
    <tr>
        <th>{{ __('labels.frontend.user.profile.avatar') }}</th>
        <td><img src="{{ auth()->user()->picture }}" class="user-profile-image" /></td>
    </tr>
    <tr>
        <th>{{ __('labels.frontend.user.profile.name') }}</th>
        <td>{{ auth()->user()->name }}</td>
    </tr>
    <tr>
        <th>{{ __('labels.frontend.user.profile.email') }}</th>
        <td>{{ auth()->user()->email }}</td>
    </tr>
    <tr>
        <th>{{ __('labels.frontend.user.profile.created_at') }}</th>
        <td>{{ auth()->user()->created_at }} ({{ auth()->user()->created_at->diffForHumans() }})</td>
    </tr>
    <tr>
        <th>{{ __('labels.frontend.user.profile.last_updated') }}</th>
        <td>{{ auth()->user()->updated_at }} ({{ auth()->user()->updated_at->diffForHumans() }})</td>
    </tr>
</table>