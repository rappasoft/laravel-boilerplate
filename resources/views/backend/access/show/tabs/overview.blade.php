<table class="table table-striped table-hover">
    <tr>
        <th>{{ __('Avatar') }}</th>
        <td><img src="{{ $user->picture }}" class="user-profile-image" /></td>
    </tr>

    <tr>
        <th>{{ __('Name') }}</th>
        <td>{{ $user->name }}</td>
    </tr>

    <tr>
        <th>{{ __('E-mail') }}</th>
        <td>{{ $user->email }}</td>
    </tr>

    <tr>
        <th>{{ __('Status') }}</th>
        <td>{!! $user->status_label !!}</td>
    </tr>

    <tr>
        <th>{{ __('Confirmed') }}</th>
        <td>{!! $user->confirmed_label !!}</td>
    </tr>

    <tr>
        <th>{{ __('Created At') }}</th>
        <td>{{ $user->created_at }} ({{ $user->created_at->diffForHumans() }})</td>
    </tr>

    <tr>
        <th>{{ __('Last Updated') }}</th>
        <td>{{ $user->updated_at }} ({{ $user->updated_at->diffForHumans() }})</td>
    </tr>

    @if ($user->trashed())
        <tr>
            <th>{{ __('Deleted At') }}</th>
            <td>{{ $user->deleted_at }} ({{ $user->deleted_at->diffForHumans() }})</td>
        </tr>
    @endif
</table>