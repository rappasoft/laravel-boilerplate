@extends('frontend.layouts.app')

@section('content')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">{{ __('Login') }}</div>

                <div class="panel-body">

                    {{ Form::open(['route' => 'frontend.auth.login', 'class' => 'form-horizontal']) }}

                    <div class="form-group">
                        {{ Form::label('email', __('E-mail Address'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => __('E-mail Address')]) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('password', __('Password'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => __('Password')]) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox('remember') }} {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {{ Form::submit(__('Login'), ['class' => 'btn btn-primary', 'style' => 'margin-right:15px']) }}

                            {{ link_to_route('frontend.auth.password.reset', __('Forgot Your Password?')) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    {{ Form::close() }}

                    <div class="row text-center">
                        {!! $socialite_links !!}
                    </div>
                </div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

    </div><!-- row -->

@endsection