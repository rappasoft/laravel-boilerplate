@extends('frontend.layouts.app')

@section('title', app_name() . ' | Login')

@section('content')
<!-- Login Page Block -->
<div class="row justify-content-center align-items-center">

    <div class="col col-sm-8 align-self-center">

        <div class="card">

            <div class="card-header">
                <strong>
                    {{ __('labels.frontend.auth.login_box_title') }}
                </strong>
            </div><!--card-header-->

            <div class="card-body">

                {{ Form::open(['route' => 'frontend.auth.login.post', 'class' => 'form']) }}

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('email', __('validation.attributes.frontend.email'), ['class' => '']) }}
                            {{ Form::email('email', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => __('validation.attributes.frontend.email')]) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('password', __('validation.attributes.frontend.password'), ['class' => '']) }}
                            {{ Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('validation.attributes.frontend.password')]) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox('remember') }} {{ __('labels.frontend.auth.remember_me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <button type="submit" name="button" class="btn btn-primary">
                                <i class='fa fa-sign-in'></i> {{ __('labels.frontend.auth.login_button') }}
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ link_to_route('frontend.auth.password.reset', __('labels.frontend.passwords.forgot_password')) }}
                        </div>
                    </div>
                </div>

                {{ Form::close() }}

                <div class="row">
                    <div class="col">
                        <div class="text-center">
                            {!! $socialiteLinks !!}
                        </div>
                    </div>
                </div>


            </div><!--card body-->

        </div><!--card-->

    </div><!-- col-md-8 -->

</div><!-- row -->
<!-- / Login Page Block -->
@endsection
