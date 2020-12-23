@forelse($roles->where('type', $type) as $role)
    <div class="mb-2">
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
    </div>

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
    <p class="mb-0"><em>@lang('There are no roles to choose from for this type.')</em></p>
@endforelse
