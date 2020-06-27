@if($user->isActive())
    <span class='badge badge-success'>@lang('Active')</span>
@else
    <span class='badge badge-danger'>@lang('Inactive')</span>
@endif
