@extends ('backend.layouts.master')

@section ('title', 'Permission Management')

@section ('breadcrumbs')
    <ol class="breadcrumb">
        <li>{!! link_to_route('admin.access.users.index', 'Home') !!}</li>
        <li class="active"><a href="{{route('admin.access.roles.permissions.index')}}" class="bread-current">Permission Management</a></li>
    </ol>
@stop

@section('content')

    <div class="widget">

        <div class="widget-head">
            <div class="pull-left">All Permissions</div>

            <div class="pull-right" style="margin-bottom:10px">
                <a href="{{route('admin.access.roles.permissions.create')}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Permission</a>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="widget-content">

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

            <div class="widget-foot">
                <div class="pull-left">
                    {{ $permissions->total() }} permissions(s) total
                </div>

                <div class="pull-right">
                    {{ $permissions->render() }}
                </div>

                <div class="clearfix"></div>
            </div><!--widget foot-->

        </div><!--widget content-->
    </div><!--widget-->

@stop
