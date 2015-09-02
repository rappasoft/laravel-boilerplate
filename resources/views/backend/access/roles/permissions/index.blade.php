@extends ('backend.layouts.master')

@section ('title', trans('menus.permission_management'))

@section('page-header')
    <h1>
        {{ trans('menus.user_management') }}
        <small>{{ trans('menus.permission_management') }}</small>
    </h1>
@endsection

@section ('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li>{!! link_to_route('admin.access.users.index', trans('menus.user_management')) !!}</li>
    <li class="active">{!! link_to_route('admin.access.roles.permissions.index', trans('menus.permission_management')) !!}</li>
@stop

@section('content')
    @include('backend.access.includes.partials.header-buttons')

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>{{ trans('crud.permissions.permission') }}</th>
            <th>{{ trans('crud.permissions.name') }}</th>
            <th>{{ trans('crud.permissions.users') }}</th>
            <th>{{ trans('crud.permissions.roles') }}</th>
            <th>{{ trans('crud.permissions.system') }}</th>
            <th>{{ trans('crud.actions') }}</th>
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
        {{ $permissions->total() }} {{ trans('crud.permissions.total') }}
    </div>

    <div class="pull-right">
        {{ $permissions->render() }}
    </div>

    <div class="clearfix"></div>
@stop
