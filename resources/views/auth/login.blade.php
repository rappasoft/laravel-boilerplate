@extends('layouts.master')

@section('content')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">

                    {!! Form::open(['url' => 'auth/login', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">E-mail Address</label>
                            <div class="col-md-6">
                                {!! Form::input('email', 'email', old('email'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('remember') !!} Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Login', ['class' => 'btn btn-primary', 'style' => 'margin-right:15px']) !!}

                                {!! link_to('password/email', 'Forgot Your Password?') !!}
                            </div>
                        </div>

                    {!! Form::close() !!}

                    <div class="row text-center">
                        {!! link_to_route('auth.provider', 'Login with Github', 'github') !!}&nbsp;|&nbsp;
                        {!! link_to_route('auth.provider', 'Login with Facebook', 'facebook') !!}&nbsp;|&nbsp;
                        {!! link_to_route('auth.provider', 'Login with Twitter', 'twitter') !!}&nbsp;|&nbsp;
                        {!! link_to_route('auth.provider', 'Login with Google', 'google') !!}
                    </div>
                </div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

    </div><!-- row -->

@endsection