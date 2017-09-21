@extends('frontend.layouts.app')

@section('title', app_name() . ' | Reset Password')

@section('content')

    <div class="row justify-content-center align-items-center">

        <div class="col col-sm-6 align-self-center">

            <div class="card">

                <div class="card-header">
                    <strong>
                        {{ __('labels.frontend.passwords.reset_password_box_title') }}
                    </strong>
                </div><!--card-header-->

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Form::open(['route' => 'frontend.auth.password.reset', 'class' => 'form-horizontal']) }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ Form::label('email', __('validation.attributes.frontend.email')) }}
                                {{ Form::email('email', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => __('validation.attributes.frontend.email')]) }}
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ Form::label('password', __('validation.attributes.frontend.password')) }}
                                {{ Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('validation.attributes.frontend.password')]) }}
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ Form::label('password_confirmation', __('validation.attributes.frontend.password_confirmation')) }}
                                {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('validation.attributes.frontend.password_confirmation')]) }}
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <button type="submit" name="button" class="btn btn-primary">
                                    <i class='fa fa-check'></i> {{ __('labels.frontend.passwords.reset_password_button') }}
                                </button>
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

                    {{ Form::close() }}

                </div><!-- card-body -->

            </div><!-- card -->

        </div><!-- col-6 -->

    </div><!-- row -->

@endsection
