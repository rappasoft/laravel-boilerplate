<ul class="list-unstyled">
    @foreach($children as $permission)
        <li>
            <input type="checkbox" name="permissions[]" {{ in_array($permission->id, $usedPermissions ?? [], true) ? 'checked' : '' }} value="{{ $permission->name }}" id="{{ $permission->name }}" />
            <label for="{{ $permission->name }}">{{ $permission->description ?? $permission->name }}</label>

            @if($permission->children->count())
                @include('backend.auth.role.includes.children', ['children' => $permission->children])
            @endif
        </li>
    @endforeach
</ul>
