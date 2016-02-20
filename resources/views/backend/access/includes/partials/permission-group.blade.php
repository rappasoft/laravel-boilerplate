<ul style="list-style:none;">
@foreach ($groups as $group)
    <li><h3>{{ $group->name }}</h3></li>
    @foreach ($group->permissions as $permission)
        <?php
        $dependencies = [];
        if($permission->dependencies->count()) {
            $permission->dependencies->load('permission');
            $dependency_list = implode(", ", $permission->dependencies->lists('permission.display_name')->all());
            $dependencies = $permission->dependencies->lists('dependency_id')->all();
        }
        $dependencies = json_encode($dependencies);
        ?>
        <span>
            <input type="checkbox" value="{{ $permission->id }}" name="permission_user[]" data-dependencies="{!! $dependencies !!}" {{in_array($permission->id, $user_permissions) ? 'checked' : ""}} id="permission-{{ $permission->id }}" />
            <label for="permission-{{ $permission->id }}">
                @if ($permission->dependencies->count())
                    <a style="color:black;text-decoration:none;" data-toggle="tooltip" data-html="true" title="<strong>{{ trans('labels.backend.access.users.dependencies') }}:</strong> {!! $dependency_list !!}">
                        {!! $permission->display_name !!} <sub><em>D</em></sub></a>
                @else
                    {!! $permission->display_name !!}
                @endif
            </label>
        </span>
    @endforeach

    <li>
    @if(isset($group->children))
        @include('backend.access.includes.partials.permission-group', ['groups' => $group->children])
    @endif
    </li>
@endforeach
</ul>