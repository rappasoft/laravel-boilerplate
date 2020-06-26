<div class="form-group row">
    <label for="roles" class="col-md-2 col-form-label">@lang('Roles')</label>

    <div class="col-md-10">
        @forelse($roles as $role)
            <span class="d-block mb-2">
            <div class="form-check">
                <input
                    name="roles[]"
                    id="role_{{ $role->id }}"
                    value="{{ $role->id }}"
                    class="form-check-input"
                    type="checkbox"
                    {{ (old('rules') && in_array($role->id, old('rules'), true)) || (isset($user) && in_array($role->id, $user->roles->modelKeys(), true)) ? 'checked' : '' }} />

                <label class="form-check-label" for="role_{{ $role->id }}">
                    {{ $role->name }}
                </label>
            </div><!--form-check-->
        </span>

            @if ($role->isAdmin())
                <blockquote class="ml-3">
                    <i class="fa fa-check-circle"></i> @lang('All Permissions')
                </blockquote>
            @else
                @if ($role->permissions->count())
                    <blockquote class="ml-3">
                        @foreach ($role->permissions as $permission)
                            <i class="fa fa-check-circle"></i> {{ $permission->description }}<br/>
                        @endforeach
                    </blockquote>
                @else
                    <blockquote class="ml-3">
                        <i class="fa fa-minus-circle"></i> @lang('No Permissions')
                    </blockquote>
                @endif
            @endif
        @empty
            <p>@lang('There are no roles to choose from.')</p>
        @endforelse
    </div>
</div><!--form-group-->
