@extends ('backend.layouts.master')

@section ('title', 'Permission Management')

@section('page-header')
    <h1>
        User Management
        <small>Permission Management</small>
    </h1>
@endsection

@section ('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li>{!! link_to_route('admin.access.users.index', 'User Management') !!}</li>
    <li>{!! link_to_route('admin.access.roles.permissions.index', 'Permission Management') !!}</li>
@stop

@section('content')
    @include('backend.access.includes.partials.header-buttons')

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>Permission</th>
            <th>Name</th>
            <th>Users</th>
            <th>Roles</th>
            <th>System?</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
            <tr>
                <td>{!! $permission->name !!}</td>
                <td>{!! $permission->display_name !!}</td>
                <td>
                    @if (count($permission->users))
                        @foreach($permission->users as $user)
                            {!! $user->name !!}<br/>
                        @endforeach
                    @else
                        None
                    @endif
                </td>
                <td>
                    @if (count($permission->roles))
                        @foreach($permission->roles as $role)
                            {!! $role->name !!}<br/>
                        @endforeach
                    @else
                        None
                    @endif
                </td>
                <td>{!! $permission->system_label !!}</td>
                <td>{!! $permission->action_buttons !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-left">
        {{ $permissions->total() }} permissions(s) total
    </div>

    <div class="pull-right">
        {{ $permissions->render() }}
    </div>

    <div class="clearfix"></div>
@stop
