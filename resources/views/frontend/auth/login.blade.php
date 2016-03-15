@extends('frontend.layouts.master')

@section('content')
    <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-box-msg">
            <strong>{{ trans('labels.frontend.auth.start') }}</strong>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            {!! Form::open(['url' => 'login', 'class' => 'form-horizontal']) !!}
            <div class="form-group has-feedback">
                <div class="col-md-12">
                    {!! Form::input('email', 'email', null, ['class' => 'form-control ', 'placeholder' => 'Email']) !!}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div><!--col-md-12-->
            </div><!--form-group-->

            <div class="form-group has-feedback">
                <div class="col-md-12">
                    {!! Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div><!--col-md-12-->
            </div><!--form-group-->
            <div class="row">
                <div class="col-xs-8">
                    <label>
                        {!! Form::checkbox('remember') !!} {{ trans('labels.frontend.auth.remember_me') }}
                    </label>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    {!! Form::submit(trans('labels.frontend.auth.login_button'), ['class' => 'btn btn-primary', 'style' => 'margin-right:15px']) !!}
                </div><!-- /.col -->
            </div>
            {!! Form::close() !!}

            {{--<div class="social-auth-links text-center">--}}
                {{--<p>- OR -</p>--}}
                {{--<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in--}}
                    {{--using Facebook</a>--}}
                {{--<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in--}}
                    {{--using Google+</a>--}}
            {{--</div><!-- /.social-auth-links -->--}}

            {!! link_to('password/reset', trans('labels.frontend.passwords.forgot_password')) !!}

        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->


@endsection