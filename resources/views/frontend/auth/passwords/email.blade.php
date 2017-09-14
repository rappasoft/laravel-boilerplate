@extends('frontend.layouts.app')

@section('title', app_name() . ' | Reset Password')

@section('content')
    <div class="row justify-content-md-center mt-5">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">
                    {{ __('labels.frontend.passwords.reset_password_box_title') }}
                </div><!--card-header-->

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Form::open(['route' => 'frontend.auth.password.email.post', 'class' => 'form-horizontal']) }}

                    <div class="form-group">
                        {{ Form::label('email', __('validation.attributes.frontend.email'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            {{ Form::email('email', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => __('validation.attributes.frontend.email')]) }}
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    <div class="form-group">
                        <div class="col-md-12">
                            {{ Form::submit(__('labels.frontend.passwords.send_password_reset_link_button'), ['class' => 'btn btn-primary']) }}
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    {{ Form::close() }}

                </div><!--card-body-->

            </div><!--card-->

        </div><!-- col-md-8 -->

    </div><!-- row -->
@endsection