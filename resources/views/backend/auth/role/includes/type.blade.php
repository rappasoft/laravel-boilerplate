@inject('user', '\App\Domains\Auth\Models\User')

@if ($role->type === $user::TYPE_ADMIN)
    @lang('Administrator')
@else
    @lang('User')
@endif
