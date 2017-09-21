@extends('frontend.layouts.app')

@section('title', app_name() . ' | Register')

@section('content')

    <div class="row justify-content-center align-items-center">

        <div class="col col-sm-8 align-self-center">

            <div class="card">

                <div class="card-header">
                    <strong>
                        {{ __('labels.frontend.auth.register_box_title') }}
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    {{ Form::open(['route' => 'frontend.auth.register.post', 'class' => 'form']) }}

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                {{ Form::label('first_name', __('validation.attributes.frontend.first_name')) }}
                                {{ Form::text('first_name', null,
                                ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => __('validation.attributes.frontend.first_name')]) }}
                            </div><!--col-->
                        </div><!--row-->

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                {{ Form::label('last_name', __('validation.attributes.frontend.last_name')) }}
                                {{ Form::text('last_name', null,
                                ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => __('validation.attributes.frontend.last_name')]) }}
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

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

                    @if (config('access.captcha.registration'))
                        <div class="row">
                            <div class="col">
                                {!! Form::captcha() !!}
                                {{ Form::hidden('captcha_status', 'true') }}
                            </div><!--col-->
                        </div><!--row-->
                    @endif

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <button type="submit" name="button" class="btn btn-primary">
                                    <i class='fa fa-check'></i> {{ __('labels.frontend.auth.register_button') }}
                                </button>
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

                    {{ Form::close() }}
                </div><!-- card-body -->

            </div><!-- card -->

        </div><!-- col-md-8 -->

    </div><!-- row -->

@endsection

@push('after-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif
@endpush
