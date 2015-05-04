@extends ('backend.layouts.master')

@section ('title', 'Role Management')

@section ('breadcrumbs')
    <ol class="breadcrumb">
        <li>{!! link_to_route('admin.access.users.index', 'Home') !!}</li>
        <li class="active"><a href="{{route('admin.access.roles.index')}}" class="bread-current">Role Management</a></li>
    </ol>
@stop

@section('content')

    <div class="widget">

        <div class="widget-head">
            <div class="pull-left">All Roles</div>

            <div class="pull-right" style="margin-bottom:10px">
                <a href="{{route('admin.access.roles.create')}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Role</a>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="widget-content">

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

            <div class="widget-foot">
                <div class="pull-left">
                    {{ $roles->total() }} roles(s) total
                </div>

                <div class="pull-right">
                    {{ $roles->render() }}
                </div>

                <div class="clearfix"></div>
            </div><!--widget foot-->

        </div><!--widget content-->
    </div><!--widget-->

@stop