@extends ('backend.layouts.master')

@section ('title', 'Role Management')

@section('page-header')
    <h1>
        User Management
        <small>Role Management</small>
    </h1>
@endsection

@section ('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li>{!! link_to_route('admin.access.users.index', 'User Management') !!}</li>
    <li>{!! link_to_route('admin.access.roles.index', 'Role Management') !!}</li>
@stop

@section('content')
    @include('backend.access.includes.partials.header-buttons')

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>Role</th>
            <th>Permissions</th>
            <th># Users</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{!! $role->name !!}</td>
                    <td>
                        @if (count($role->permissions) > 0)
                            @foreach ($role->permissions as $permission)
                                {!! $permission->display_name !!}<br/>
                            @endforeach
                        @else
                            None
                        @endif
                    </td>
                    <td>{!! $role->users()->count() !!}</td>
                    <td>{!! $role->action_buttons !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-left">
        {{ $roles->total() }} roles(s) total
    </div>

    <div class="pull-right">
        {{ $roles->render() }}
    </div>

    <div class="clearfix"></div>
@stop