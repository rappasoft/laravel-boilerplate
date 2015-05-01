@extends ('layouts.master')

@section ('title', 'Role Management | Create Role')

@section ('before-styles-end')
    {!! HTML::style('css/vault/jquery.onoff.css') !!}
@stop

@section ('breadcrumbs')
    <ol class="breadcrumb">
        <li>{!! link_to_route('admin.access.users.index', 'Home') !!}</li>
        <li><a href="{{route('admin.access.roles.index')}}">Role Management</a></li>
        <li class="active"><a href="{{route('admin.access.roles.create')}}" class="bread-current">Create Role</a></li>
    </ol>
@stop

@section('content')

    <div class="widget">

        <div class="widget-head">
            <div class="pull-left" style="margin-bottom:10px">Create Role</div>
            <div class="clearfix"></div>
        </div>

        <div class="widget-content">

            {!! Form::open(['route' => 'admin.access.roles.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

            <div class="padd">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Role Name</label>
                    <div class="col-lg-10">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Role Name']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">Associated Permissions</label>
                    <div class="col-lg-3">
                        @if (count($permissions) > 0)
                            @foreach($permissions as $perm)
                                {!! $perm->display_name !!}
                                <div class="sw-green create-permissions-switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" value="{{$perm->id}}" name="role_permissions[]" class="toggleBtn onoffswitch-checkbox" id="perm-{{$perm->id}}">
                                        <label for="perm-{{$perm->id}}" class="onoffswitch-label">
                                            <div class="onoffswitch-inner"></div>
                                            <div class="onoffswitch-switch"></div>
                                        </label>
                                    </div>
                                </div><!--green checkbox-->
                                <div class="clearfix"></div>
                            @endforeach
                        @else
                            No permissions to set
                        @endif
                    </div>
                </div><!--form control-->

            </div><!--padd-->

            <div class="widget-foot">
                <div class="pull-left">
                    <a href="{{route('admin.access.roles.index')}}" class="btn btn-danger">Cancel</a>
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