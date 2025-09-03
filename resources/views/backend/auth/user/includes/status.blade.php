@if($user->isActive())
    <span class='badge bg-success'>@lang('Active')</span>
@else
    <span class='badge bg-danger'>@lang('Inactive')</span>
@endif
