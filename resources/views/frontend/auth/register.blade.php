@extends('frontend.layouts.app')

@section('title', app_name() . ' | Register')

@section('content')
    <div class="row justify-content-md-center mt-5 mb-5">

        <div class="col-md-8">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title text-center">{{ __('labels.frontend.auth.register_box_title') }}</h4>

                    {{ Form::open(['route' => 'frontend.auth.register.post', 'class' => 'form-horizontal']) }}

                    <div class="form-group">
                        {{ Form::label('first_name', __('validation.attributes.frontend.first_name'),
                        ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            {{ Form::text('first_name', null,
                            ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => __('validation.attributes.frontend.first_name')]) }}
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('last_name', __('validation.attributes.frontend.last_name'),
                        ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            {{ Form::text('last_name', null,
                            ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => __('validation.attributes.frontend.last_name')]) }}
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('email', __('validation.attributes.frontend.email'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            {{ Form::email('email', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => __('validation.attributes.frontend.email')]) }}
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('password', __('validation.attributes.frontend.password'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            {{ Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('validation.attributes.frontend.password')]) }}
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('password_confirmation', __('validation.attributes.frontend.password_confirmation'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('validation.attributes.frontend.password_confirmation')]) }}
                        </div><!--col-md-12-->
                    </div><!--form-group-->

                    @if (config('access.captcha.registration'))
                        <div class="form-group">
                            <div class="col-md-12">
                                {!! Form::captcha() !!}
                                {{ Form::hidden('captcha_status', 'true') }}
                            </div><!--col-md-6-->
                        </div><!--form-group-->
                    @endif

                    <div class="form-group">
                        <div class="col-md-12">
                            {{ Form::submit(__('labels.frontend.auth.register_button'), ['class' => 'btn btn-primary']) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    {{ Form::close() }}
                </div><!--card body-->

            </div><!--card-->

        </div><!-- col-md-8 -->

    </div><!-- row -->
@endsection

@push('after-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif
@endpush