@extends ('backend.layouts.master')

@section ('title', trans('menus.role_management'))

@section('page-header')
    <h1>
        {{ trans('menus.user_management') }}
        <small>{{ trans('menus.role_management') }}</small>
    </h1>
@endsection

@section ('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li>{!! link_to_route('admin.access.users.index', trans('menus.user_management')) !!}</li>
    <li class="active">{!! link_to_route('admin.access.roles.index', trans('menus.role_management')) !!}</li>
@stop

@section('content')
    @include('backend.access.includes.partials.header-buttons')

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>{{ trans('crud.roles.role') }}</th>
            <th>{{ trans('crud.roles.permissions') }}</th>
            <th>{{ trans('crud.roles.number_of_users') }}</th>
            <th>{{ trans('crud.actions') }}</th>
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
        {{ $roles->total() }} {{ trans('crud.roles.total') }}
    </div>

    <div class="pull-right">
        {{ $roles->render() }}
    </div>

    <div class="clearfix"></div>
@stop