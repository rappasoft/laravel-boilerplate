@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="panel panel-default">

                <div class="panel-heading">{{ __('Reset Password') }}</div>

                <div class="panel-body">

                    {{ Form::open(['route' => 'frontend.auth.password.reset', 'class' => 'form-horizontal']) }}

                    <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            {{ Form::label('email', __('E-mail Address'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                <p class="form-control-static">{{ $email }}</p>
                                {{ Form::input('hidden', 'email', $email, ['class' => 'form-control', 'placeholder' => __('E-mail Address')]) }}
                            </div><!--col-md-6-->
                        </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('password', __('Password'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => __('Password')]) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('password_confirmation', __('Password Confirmation'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder' => __('Password Confirmation')]) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {{ Form::submit(__('Reset Password'), ['class' => 'btn btn-primary']) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    {{ Form::close() }}

                </div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

    </div><!-- row -->
@endsection
