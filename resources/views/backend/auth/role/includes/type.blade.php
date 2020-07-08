@inject('user', '\App\Domains\Auth\Models\User')

@if ($role->type === $user::TYPE_ADMIN)
    @lang('Administrator')
@elseif ($role->type === $user::TYPE_USER)
    @lang('User')
@else
    @lang('N/A')
@endif
