@extends('frontend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">

                <div class="panel-heading">{{ trans('labels.frontend.passwords.reset_password_box_title') }}</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Form::open(['route' => 'auth.password.reset', 'class' => 'form-horizontal']) }}

                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">

                    <div class="form-group">
                        {{ Form::label('password', trans('validation.attributes.frontend.password'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.password')]) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('password_confirmation', trans('validation.attributes.frontend.password_confirmation'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.password_confirmation')]) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {{ Form::submit(trans('labels.frontend.passwords.reset_password_button'), ['class' => 'btn btn-primary']) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    {{ Form::close() }}

                </div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

    </div><!-- row -->
@endsection