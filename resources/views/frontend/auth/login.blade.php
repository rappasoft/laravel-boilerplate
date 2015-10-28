@extends('frontend.layouts.master')

@section('content')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">{{trans('labels.login_box_title')}}</div>

                <div class="panel-body">

                    {!! Form::open(['url' => 'auth/login', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                        <div class="form-group">
                            {!! Form::label('email', trans('validation.attributes.email'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('email', 'email', old('email'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', trans('validation.attributes.password'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('remember') !!} {{ trans('labels.remember_me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit(trans('labels.login_button'), ['class' => 'btn btn-primary', 'style' => 'margin-right:15px']) !!}

                                {!! link_to('password/email', trans('labels.forgot_password')) !!}
                            </div>
                        </div>

                    {!! Form::close() !!}

                    <div class="row text-center">
                        {!! $socialite_links !!}
                    </div>
                </div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

    </div><!-- row -->

@endsection