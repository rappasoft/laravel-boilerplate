@extends ('layouts.master')

@section ('title', 'User Management | Create User')

@section ('before-styles-end')
    {!! HTML::style('css/vault/jquery.onoff.css') !!}
@stop

@section ('breadcrumbs')
    <ol class="breadcrumb">
        <li>{!! link_to_route('admin.access.users.index', 'Home') !!}</li>
        <li><a href="{{route('admin.access.users.index')}}">User Management</a></li>
        <li class="active"><a href="{{route('admin.access.users.create')}}" class="bread-current">Create User</a></li>
    </ol>
@stop

@section('content')

    <div class="widget">

        <div class="widget-head">
            <div class="pull-left">Create User</div>
            <div class="clearfix"></div>
        </div>

        <div class="widget-content">

            {!! Form::open(['route' => 'admin.access.users.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

            <div class="padd">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-10">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Full Name']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">E-mail</label>
                    <div class="col-lg-10">
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail Address']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">Confirm Password</label>
                    <div class="col-lg-10">
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">Active</label>
                    <div class="col-lg-1">
                        <div class="sw-green create-permissions-switch">
                            <div class="onoffswitch">
                                <input type="checkbox" value="1" name="status" class="toggleBtn onoffswitch-checkbox" id="user-active" checked="checked">
                                <label for="user-active" class="onoffswitch-label">
                                    <div class="onoffswitch-inner"></div>
                                    <div class="onoffswitch-switch"></div>
                                </label>
                            </div>
                        </div><!--green checkbox-->
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">Associated Roles</label>
                    <div class="col-lg-3">
                        @if (count($roles) > 0)
                            @foreach($roles as $role)
                                {!! $role->name !!}
                                <div class="sw-green create-permissions-switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" value="{{$role->id}}" name="assignees_roles[]" class="toggleBtn onoffswitch-checkbox" id="role-{{$role->id}}">
                                        <label for="role-{{$role->id}}" class="onoffswitch-label">
                                            <div class="onoffswitch-inner"></div>
                                            <div class="onoffswitch-switch"></div>
                                        </label>
                                    </div>
                                </div><!--green checkbox-->
                                <div class="clearfix"></div>

                                @if (count($role->permissions) > 0)
                                    <blockquote class="small">{{--
                                        --}}@foreach ($role->permissions as $perm){{--
                                            --}}{{$perm->display_name}}<br/>
                                        @endforeach
                                    </blockquote>
                                @else
                                    No permissions<br/><br/>
                                @endif
                            @endforeach
                        @else
                            No Roles to set
                        @endif
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">Other Permissions</label>
                    <div class="col-lg-3">
                        @if (count($permissions))
                            @foreach ($permissions as $perm)
                                {!! $perm->display_name !!}
                                <div class="other-permissions-switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" value="{{$perm->id}}" name="permission_user[]" class="toggleBtn onoffswitch-checkbox" id="permission-{{$perm->id}}">
                                        <label for="permission-{{$perm->id}}" class="onoffswitch-label">
                                            <div class="onoffswitch-inner"></div>
                                            <div class="onoffswitch-switch"></div>
                                        </label>
                                    </div>
                                </div><!--green checkbox-->
                                <div class="clearfix"></div>
                            @endforeach
                        @else
                            No other permissions
                        @endif
                    </div><!--col 3-->
                </div><!--form control-->

            </div><!--padd-->

            <div class="widget-foot">
                <div class="pull-left">
                    <a href="{{route('admin.access.users.index')}}" class="btn btn-danger">Cancel</a>
                </div>

                <div class="pull-right">
                    <input type="submit" class="btn btn-success" value="Save" />
                </div>
                <div class="clearfix"></div>
            </div><!--widget foot-->

            {!! Form::close() !!}
        </div><!--widget content-->
    </div><!--widget-->

@stop