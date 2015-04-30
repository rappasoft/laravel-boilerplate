@extends ('vault::............layouts.master')

@section ('title', 'Permission Management | Create Permission')

@section ('before-styles-end')
    {!! HTML::style('css/vault/jquery.onoff.css') !!}
@stop

@section ('breadcrumbs')
    <ol class="breadcrumb">
        <li>{!! link_to_route('access.users.index', 'Home') !!}</li>
        <li><a href="{{route('access.roles.permissions.index')}}">Permission Management</a></li>
        <li class="active"><a href="{{route('access.roles.permissions.create')}}" class="bread-current">Create Permission</a></li>
    </ol>
@stop

@section('content')

    <div class="widget">

        <div class="widget-head">
            <div class="pull-left" style="margin-bottom:10px">Create Permission</div>
            <div class="clearfix"></div>
        </div>

        <div class="widget-content">

            {!! Form::open(['route' => 'access.roles.permissions.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

                <div class="padd">
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
                                            <input type="checkbox" {{$role->id == 1 && Config::get('vault.roles.administrator_forced') ? "disabled='disabled' checked='checked'" : ''}} value="{{$role->id}}" name="permission_roles[]" class="toggleBtn onoffswitch-checkbox" id="role-{{$role->id}}">
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

                            @if (Config::get('vault.roles.administrator_forced'))
                                {!! Form::hidden('permission_roles[]', 1) !!}
                            @endif
                        </div>
                    </div><!--form control-->

                </div><!--padd-->

                <div class="widget-foot">
                    <div class="pull-left">
                        <a href="{{route('access.roles.permissions.index')}}" class="btn btn-danger">Cancel</a>
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