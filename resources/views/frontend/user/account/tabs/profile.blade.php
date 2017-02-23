<table class="table table-striped table-hover">
    <tr>
        <th>{{ __('Avatar') }}</th>
        <td><img src="{{ $logged_in_user->picture }}" class="user-profile-image" /></td>
    </tr>
    <tr>
        <th>{{ __('Name') }}</th>
        <td>{{ $logged_in_user->name }}</td>
    </tr>
    <tr>
        <th>{{ __('E-mail') }}</th>
        <td>{{ $logged_in_user->email }}</td>
    </tr>
    <tr>
        <th>{{ __('Created At') }}</th>
        <td>{{ $logged_in_user->created_at }} ({{ $logged_in_user->created_at->diffForHumans() }})</td>
    </tr>
    <tr>
        <th>{{ __('Last Updated') }}</th>
        <td>{{ $logged_in_user->updated_at }} ({{ $logged_in_user->updated_at->diffForHumans() }})</td>
    </tr>
</table>