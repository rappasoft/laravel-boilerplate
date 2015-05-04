@extends ('backend.layouts.master')

@section ('title', 'Permission Management | Edit Permission')

@section ('before-styles-end')
    {!! HTML::style('css/vault/jquery.onoff.css') !!}
@stop

@section ('breadcrumbs')
    <ol class="breadcrumb">
        <li>{!! link_to_route('admin.access.users.index', 'Home') !!}</li>
        <li><a href="{{route('admin.access.roles.permissions.index')}}">Permission Management</a></li>
        <li><a href="{{route('admin.access.roles.permissions.edit', $permission->id)}}">{{$permission->display_name}}</a></li>
        <li class="active"><a href="{{route('admin.access.roles.permissions.edit', $permission->id)}}" class="bread-current">Edit</a></li>
    </ol>
@stop

@section('content')

    <div class="widget">

        <div class="widget-head">
            <div class="pull-left" style="margin-bottom:10px">Edit Permission</div>
            <div class="clearfix"></div>
        </div>

        <div class="widget-content">

            {!! Form::model($permission, ['route' => ['admin.access.roles.permissions.update', $permission->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) !!}

            <div class="padd">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Permission Name</label>
                    <div class="col-lg-10">
                        <input type="text" name="name" class="form-control" placeholder="Permission Name" {{$permission->system == 1 ? 'readonly="readonly"' : ''}} value="{{$permission->name}}" />
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
                    <label class="col-lg-2 control-label">Associated Roles</label>
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

            </div><!--padd-->

            <div class="widget-foot">
                <div class="pull-left">
                    <a href="{{route('admin.access.roles.permissions.index')}}" class="btn btn-danger">Cancel</a>
                </div>

                <div class="pull-right">
                    <input type="submit" class="btn btn-success" value="Update" />
                </div>
                <div class="clearfix"></div>
            </div><!--widget foot-->

            {!! Form::close() !!}
        </div><!--widget content-->
    </div><!--widget-->

@stop