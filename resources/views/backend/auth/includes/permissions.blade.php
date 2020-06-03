<x-forms.group for="permissions" :label="__('Permissions')">
    @include('backend.auth.role.includes.no-permissions-message')

    @if ($general->count())
        <h5 class="mb-3">@lang('General Permissions')</h5>

        <div class="row">
            <div class="col">
                @foreach($general as $permission)
                    <span class="d-block">
                        <input type="checkbox" name="permissions[]" {{ in_array($permission->id, $usedPermissions ?? [], true) ? 'checked' : '' }} value="{{ $permission->name }}" id="{{ $permission->name }}" />
                        <label for="{{ $permission->name }}">{{ $permission->description ?? $permission->name }}</label>
                    </span>
                @endforeach
            </div><!--col-->
        </div><!--row-->
    @endif

    @if ($general->count() && $categories->count())
        <hr/>
    @endif

    @if ($categories->count())
        <h5 class="mb-3">@lang('Permission Categories')</h5>

        <ul id="tree" class="m-0 p-0" style="list-style: none;">
            @foreach($categories as $permission)
                <li>
                    <input type="checkbox" name="permissions[]" {{ in_array($permission->id, $usedPermissions ?? [], true) ? 'checked' : '' }} value="{{ $permission->name }}" id="{{ $permission->name }}" />
                    <label for="{{ $permission->name }}">{{ $permission->description ?? $permission->name }}</label>

                    @if($permission->children->count())
                        @include('backend.auth.role.includes.children', ['children' => $permission->children])
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</x-forms.group>
