<ul style="list-style: none">
    @foreach($children as $child)
        <li>
            <input type="checkbox" name="permissions[]" {{ isset($role) && in_array($child->id, $role->permissions->modelKeys(), true) ? 'checked' : '' }} value="{{ $child->name }}" id="{{ $child->name }}" />
            <label for="{{ $child->name }}">{{ $child->description ?? $child->name }}</label>

            @if($child->children->count())
                @include('backend.auth.role.includes.children', ['children' => $child->children])
            @endif
        </li>
    @endforeach
</ul>
