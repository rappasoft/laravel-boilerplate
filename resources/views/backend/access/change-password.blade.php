@extends ('vault::layouts.master')

@section ('title', 'User Management | Change User Password')

@section ('before-styles-end')
    {!! HTML::style('css/vault/jquery.onoff.css') !!}
@stop

@section ('breadcrumbs')
    <ol class="breadcrumb">
        <li>{!! link_to_route('access.users.index', 'Home') !!}</li>
        <li><a href="{{route('access.users.index')}}">User Management</a></li>
        <li><a href="{{route('access.users.edit', $user->id)}}">{!! $user->name !!}</a></li>
        <li><a href="{{route('access.users.edit', $user->id)}}">Edit User</a></li>
        <li class="active"><a href="{{route('access.user.change-password', $user->id)}}" class="bread-current">Change Password</a></li>
    </ol>
@stop

@section('content')

    <div class="widget">

        <div class="widget-head">
            <div class="pull-left">Change Password</div>
            <div class="clearfix"></div>
        </div>

        <div class="widget-content">

            {!! Form::open(['route' => ['access.user.change-password', $user->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

            <div class="padd">

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

            </div><!--padd-->

            <div class="widget-foot">
                <div class="pull-left">
                    <a href="{{route('access.users.index')}}" class="btn btn-danger">Cancel</a>
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