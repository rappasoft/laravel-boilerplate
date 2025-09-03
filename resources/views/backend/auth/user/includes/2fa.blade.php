@if ($user->hasTwoFactorEnabled())
    <span class="badge bg-success" data-bs-toggle="tooltip" title="{{ __('Enabled on') }}: {{ $user->updated_at ? $user->updated_at->format('M d, Y H:i') : __('Unknown') }}">@lang('Yes')</span>
@else
    <span class="badge bg-danger">@lang('No')</span>
@endif
