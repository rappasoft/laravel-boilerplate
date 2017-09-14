@extends('frontend.layouts.app')

@section('title', app_name() . ' | Login')

@section('content')

    <div class="row justify-content-md-center mt-5">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">
                    {{ __('labels.frontend.auth.login_box_title') }}
                </div><!--card-header-->

                <div class="card-body">

                    {{ Form::open(['route' => 'frontend.auth.login.post', 'class' => 'form-horizontal']) }}

                    <div class="form-group">
                        {{ Form::label('email', __('validation.attributes.frontend.email'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            {{ Form::email('email', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => __('validation.attributes.frontend.email')]) }}
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('password', __('validation.attributes.frontend.password'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            {{ Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('validation.attributes.frontend.password')]) }}
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    <div class="form-group">
                        <div class="col-md-12 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox('remember') }} {{ __('labels.frontend.auth.remember_me') }}
                                </label>
                            </div>
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    <div class="form-group">
                        <div class="col-md-12 col-md-offset-4">
                            {{ Form::submit(__('labels.frontend.auth.login_button'), ['class' => 'btn btn-primary', 'style' => 'margin-right:15px']) }}

                            {{ link_to_route('frontend.auth.password.reset', __('labels.frontend.passwords.forgot_password')) }}
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    {{ Form::close() }}

                    <div class="text-center">
                        {!! $socialiteLinks !!}
                    </div>
                </div><!--card body-->

            </div><!--card-->

        </div><!-- col-md-8 -->

    </div><!-- row -->

@endsection