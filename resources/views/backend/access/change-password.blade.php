@extends ('backend.layouts.master')

@section ('title', 'User Management | Change User Password')

@section ('before-styles-end')
    {!! HTML::style('css/plugin/jquery.onoff.css') !!}
@stop

@section('page-header')
    <h1>
        User Management
        <small>Change Password</small>
    </h1>
@endsection

@section('content')
    {!! Form::open(['route' => ['admin.access.user.change-password', $user->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Change Password for {!! $user->name !!}</h3>

                <div class="box-tools pull-right">
                    @include('backend.access.includes.partials.header-buttons')
                </div>
            </div><!-- /.box-header -->

            <div class="box-body">

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

            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    <a href="{{route('admin.access.users.index')}}" class="btn btn-danger btn-xs">Cancel</a>
                </div>

                <div class="pull-right">
                    <input type="submit" class="btn btn-success btn-xs" value="Save" />
                </div>
                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {!! Form::close() !!}
@stop