@if ($user->trashed())
    <div class="btn-group" role="group" aria-label="@lang('labels.backend.access.users.user_actions')">
        <a href="{{ route('admin.auth.user.restore', $user) }}" name="confirm_item" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="@lang('buttons.backend.access.users.restore_user')">
            <i class="fas fa-sync"></i>
        </a>

        <a href="{{ route('admin.auth.user.delete-permanently', $user) }}" name="confirm_item" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="@lang('buttons.backend.access.users.delete_permanently')">
            <i class="fas fa-trash"></i>
        </a>
    </div>
@else
    <div class="btn-group" role="group" aria-label="@lang('labels.backend.access.users.user_actions')">
        <a href="{{ route('admin.auth.user.show', $user) }}" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.view')" class="btn btn-info">
            <i class="fas fa-eye"></i>
        </a>

        <a href="{{ route('admin.auth.user.edit', $user) }}" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.edit')" class="btn btn-primary">
            <i class="fas fa-edit"></i>
        </a>

        <div class="btn-group btn-group-sm" role="group">
            <button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @lang('labels.general.more')
            </button>
            <div class="dropdown-menu" aria-labelledby="userActions">
                @if ($user->id !== auth()->id())
                    <a href="{{ route('admin.auth.user.clear-session', $user) }}"
                       data-trans-button-cancel="@lang('buttons.general.cancel')"
                       data-trans-button-confirm="@lang('buttons.general.continue')"
                       data-trans-title="@lang('strings.backend.general.are_you_sure')"
                       class="dropdown-item" name="confirm_item">@lang('buttons.backend.access.users.clear_session')</a>
                @endif

                @canBeImpersonated($user)
                    <a href="{{ route('impersonate', $user->id) }}" class="dropdown-item">@lang('buttons.backend.access.users.login_as', ['user' => $user->full_name])</a>
                @endCanBeImpersonated

                <a href="{{ route('admin.auth.user.change-password', $user) }}" class="dropdown-item">@lang('buttons.backend.access.users.change_password')</a>

                @if ($user->id !== auth()->id())
                    @switch($user->active)
                        @case(0)
                            <a href="{{ route('admin.auth.user.mark', [$user, 1,]) }}" class="dropdown-item">@lang('buttons.backend.access.users.activate')</a>
                        @break

                        @case(1)
                            <a href="{{ route('admin.auth.user.mark', [$user, 0]) }}" class="dropdown-item">@lang('buttons.backend.access.users.deactivate')</a>
                        @break
                    @endswitch
                @endif

                @if (! $user->isConfirmed() && ! config('access.users.requires_approval'))
                    <a href="{{ route('admin.auth.user.account.confirm.resend', $user) }}" class="dropdown-item">@lang('buttons.backend.access.users.resend_email')</a>
                @endif

                @if ($user->id !== 1 && $user->id !== auth()->id())
                    <a href="{{ route('admin.auth.user.destroy', $user) }}"
                       data-method="delete"
                       data-trans-button-cancel="@lang('buttons.general.cancel')"
                       data-trans-button-confirm="@lang('buttons.general.crud.delete')"
                       data-trans-title="@lang('strings.backend.general.are_you_sure')"
                       class="dropdown-item">@lang('buttons.general.crud.delete')</a>
                @endif
            </div>
        </div>
    </div>
@endif
