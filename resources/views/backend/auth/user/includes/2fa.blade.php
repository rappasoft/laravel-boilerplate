@if ($user->hasTwoFactorEnabled())
    <span class="badge badge-success" data-toggle="tooltip" title="{{ __('Enabled on') }}: {{ $user->updated_at ? $user->updated_at->format('M d, Y H:i') : __('Unknown') }}">@lang('Yes')</span>
@else
    <span class="badge badge-danger">@lang('No')</span>
@endif
