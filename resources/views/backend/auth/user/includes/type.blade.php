@if ($user->isAdmin())
    @lang('Administrator')
@else
    @lang('User')
@endif
