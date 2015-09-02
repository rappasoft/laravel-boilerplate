@extends ('backend.layouts.master')

@section ('title', trans('menus.permission_management') . ' | ' . trans('menus.edit_permission'))

@section ('before-styles-end')
    {!! HTML::style('css/plugin/jquery.onoff.css') !!}
@stop

@section('page-header')
    <h1>
        {{ trans('menus.user_management') }}
        <small>{{ trans('menus.edit_permission') }}</small>
    </h1>
@endsection

@section ('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li>{!! link_to_route('admin.access.users.index', trans('menus.user_management')) !!}</li>
    <li>{!! link_to_route('admin.access.roles.permissions.index', trans('menus.permission_management')) !!}</li>
    <li class="active">{!! link_to_route('admin.access.roles.permissions.edit', trans('strings.edit') . ' ' . $permission->display_name, $permission->id) !!}</li>
@stop

@section('content')

    @include('backend.access.includes.partials.header-buttons')

    {!! Form::model($permission, ['route' => ['admin.access.roles.permissions.update', $permission->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) !!}

        <div class="form-group">
            {!! Form::label('name', trans('validation.attributes.permission_name'), ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                <input type="text" name="name" class="form-control" placeholder="{{ trans('validation.attributes.permission_name') }}" {{$permission->system == 1 ? 'readonly="readonly"' : ''}} value="{{$permission->name}}" />
            </div>
        </div><!--form control-->

        <div class="form-group">
            {!! Form::label('display_name', trans('validation.attributes.display_name'), ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('display_name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.display_name')]) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('validation.attributes.system_permission') }}</label>
            <div class="col-lg-3">
                <div class="system-permission-switch">
                    <div class="onoffswitch">
                        <input type="checkbox" name="system" {{$permission->system == 1 ? 'checked="checked"' : ''}} class="toggleBtn onoffswitch-checkbox" id="system">
                        <label for="system" class="onoffswitch-label">
                            <div class="onoffswitch-inner"></div>
                            <div class="onoffswitch-switch"></div>
                        </label>
                    </div>
                </div><!--blue checkbox-->
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('validation.attributes.associated_roles') }}</label>
            <div class="col-lg-3">
                @if (count($roles) > 0)
                    @foreach($roles as $role)
                    {!! $role->name !!}
                    <div class="create-permissions-switch">
                        <div class="onoffswitch">
                            <input type="checkbox" {{$role->id == 1 && Config::get('access.roles.administrator_forced') ? "disabled='disabled'" : ''}} {{in_array($role->id, $permission_roles) || ($role->id == 1 && Config::get('access.roles.administrator_forced')) ? 'checked="checked"' : ""}} value="{{$role->id}}" name="permission_roles[]" class="toggleBtn onoffswitch-checkbox" id="role-{{$role->id}}">
                            <label for="role-{{$role->id}}" class="onoffswitch-label">
                                <div class="onoffswitch-inner"></div>
                                <div class="onoffswitch-switch"></div>
                            </label>
                        </div>
                    </div><!--green checkbox-->
                    <div class="clearfix"></div>
                    @endforeach
                @else
                    No Roles to set
                @endif

                @if (Config::get('access.roles.administrator_forced'))
                    {!! Form::hidden('permission_roles[]', 1) !!}
                @endif
            </div>
        </div><!--form control-->

        <div class="pull-left">
            <a href="{{route('admin.access.roles.permissions.index')}}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
        </div>

        <div class="pull-right">
            <input type="submit" class="btn btn-success" value="{{ trans('strings.save_button') }}" />
        </div>
        <div class="clearfix"></div>

    {!! Form::close() !!}
@stop