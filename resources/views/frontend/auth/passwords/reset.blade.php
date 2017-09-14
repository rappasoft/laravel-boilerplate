@extends('frontend.layouts.app')

@section('title', app_name() . ' | Reset Password')

@section('content')
    <div class="row justify-content-md-center mt-5">

        <div class="col-md-8">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title text-center">{{ __('labels.frontend.passwords.reset_password_box_title') }}</h4>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Form::open(['route' => 'frontend.auth.password.reset', 'class' => 'form-horizontal']) }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        {{ Form::label('email', __('validation.attributes.frontend.email'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            <p class="form-control-static">{{ $email }}</p>
                            {{ Form::hidden('email', $email, ['class' => 'form-control', 'placeholder' => __('validation.attributes.frontend.email')]) }}
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('password', __('validation.attributes.frontend.password'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            {{ Form::password('password', ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => __('validation.attributes.frontend.password')]) }}
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('password_confirmation', __('validation.attributes.frontend.password_confirmation'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('validation.attributes.frontend.password_confirmation')]) }}
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    <div class="form-group">
                        <div class="col-md-12">
                            {{ Form::submit(__('labels.frontend.passwords.reset_password_button'), ['class' => 'btn btn-primary']) }}
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    {{ Form::close() }}
                </div><!--card-body-->

            </div><!--card-->

        </div><!-- col-md-8 -->

    </div><!-- row -->
@endsection