<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered mb-0">
        <tr>
            <th>{{ __('Avatar') }}</th>
            <td><img src="{{ $logged_in_user->avatar }}" class="user-profile-image" /></td>
        </tr>

        <tr>
            <th>{{ __('Name') }}</th>
            <td>{{ $logged_in_user->name }}</td>
        </tr>

        <tr>
            <th>{{ __('E-mail Address') }}</th>
            <td>{{ $logged_in_user->email }}</td>
        </tr>

        @if ($logged_in_user->isSocial())
            <tr>
                <th>{{ __('Social Provider') }}</th>
                <td>{{ ucfirst($logged_in_user->provider) }}</td>
            </tr>
        @endif

        <tr>
            <th>{{ __('Timezone') }}</th>
            <td>{{ $logged_in_user->timezone ? str_replace('_', ' ', $logged_in_user->timezone) : __('N/A') }}</td>
        </tr>

        <tr>
            <th>{{ __('Account Created') }}</th>
            <td>@displayDate($logged_in_user->created_at) ({{ $logged_in_user->created_at->diffForHumans() }})</td>
        </tr>

        <tr>
            <th>{{ __('Last Updated') }}</th>
            <td>@displayDate($logged_in_user->updated_at) ({{ $logged_in_user->updated_at->diffForHumans() }})</td>
        </tr>
    </table>
</div><!--table-responsive-->
