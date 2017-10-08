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
                    <form action="{{ route('frontend.auth.register.post') }}" method="post">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="first_name">{{ __('validation.attributes.frontend.first_name') }}</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" maxlength="191" placeholder="{{ __('validation.attributes.frontend.first_name') }}" />
                                </div><!--col-->
                            </div><!--row-->

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="last_name">{{ __('validation.attributes.frontend.last_name') }}</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" maxlength="191" placeholder="{{ __('validation.attributes.frontend.last_name') }}" autofocus="autofocus" />
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">{{ __('validation.attributes.frontend.email') }}</label>
                                    <input type="email" name="email" id="email" class="form-control" maxlength="191" placeholder="{{ __('validation.attributes.frontend.email') }}" required="required" />
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="password">{{ __('validation.attributes.frontend.password') }}</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('validation.attributes.frontend.password') }}" />
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="password_confirmation">{{ __('validation.attributes.frontend.password_confirmation') }}</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('validation.attributes.frontend.password_confirmation') }}" />
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        @if (config('access.captcha.registration'))
                            <div class="row">
                                <div class="col">
                                    {!! Captcha::display() !!}
                                    <input type="hidden" name="captcha_status" value="true" />
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
                    </form>
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
