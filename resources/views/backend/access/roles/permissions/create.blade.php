@extends ('backend.layouts.master')

@section ('title', 'Permission Management | Create Permission')

@section ('before-styles-end')
    {!! HTML::style('css/plugin/jquery.onoff.css') !!}
@stop

@section('page-header')
    <h1>
        User Management
        <small>Create Permission</small>
    </h1>
@endsection

@section ('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li>{!! link_to_route('admin.access.users.index', 'User Management') !!}</li>
    <li>{!! link_to_route('admin.access.roles.permissions.index', 'Permission Management') !!}</li>
    <li>{!! link_to_route('admin.access.roles.permissions.create', 'Create Permission') !!}</li>
@stop

@section('content')

    @include('backend.access.includes.partials.header-buttons')

    {!! Form::open(['route' => 'admin.access.roles.permissions.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

        <div class="form-group">
            <label class="col-lg-2 control-label">Permission Name</label>
            <div class="col-lg-10">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Permission Name']) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">Display Name</label>
            <div class="col-lg-10">
                {!! Form::text('display_name', null, ['class' => 'form-control', 'placeholder' => 'Display Name']) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">System Permission?</label>
            <div class="col-lg-3">
                <div class="system-permission-switch">
                    <div class="onoffswitch">
                        <input type="checkbox" name="system" class="toggleBtn onoffswitch-checkbox" id="system">
                        <label for="system" class="onoffswitch-label">
                            <div class="onoffswitch-inner"></div>
                            <div class="onoffswitch-switch"></div>
                        </label>
                    </div>
                </div><!--blue checkbox-->
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">Associated Roles</label>
            <div class="col-lg-3">
                @if (count($roles) > 0)
                    @foreach($roles as $role)
                        {!! $role->name !!}
                        <div class="create-permissions-switch">
                            <div class="onoffswitch">
                                <input type="checkbox" {{$role->id == 1 && Config::get('access.roles.administrator_forced') ? "disabled='disabled' checked='checked'" : ''}} value="{{$role->id}}" name="permission_roles[]" class="toggleBtn onoffswitch-checkbox" id="role-{{$role->id}}">
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
            <a href="{{route('admin.access.roles.permissions.index')}}" class="btn btn-danger">Cancel</a>
        </div>

        <div class="pull-right">
            <input type="submit" class="btn btn-success" value="Save" />
        </div>
        <div class="clearfix"></div>

    {!! Form::close() !!}
@stop