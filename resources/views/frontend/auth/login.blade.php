@extends('frontend.layouts.app')

@section('title', app_name() . ' | Login')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        {{ __('labels.frontend.auth.login_box_title') }}
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <form action="{{ route('frontend.auth.login.post') }}" method="post">
                        {{ csrf_field() }}

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
                                    <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('validation.attributes.frontend.password') }}" required="required" />
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" value="1" /> {{ __('labels.frontend.auth.remember_me') }}
                                        </label>
                                    </div>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <button type="submit" name="button" class="btn btn-success">
                                        <i class='fa fa-sign-in'></i> {{ __('labels.frontend.auth.login_button') }}
                                    </button>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <a href="{{ route('frontend.auth.password.reset') }}">{{ __('labels.frontend.passwords.forgot_password') }}</a>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                    </form>

                    <div class="row">
                        <div class="col">
                            <div class="text-center">
                                {!! $socialiteLinks !!}
                            </div>
                        </div><!--col-->
                    </div><!--row-->
                </div><!--card body-->
            </div><!--card-->
        </div><!-- col-md-8 -->
    </div><!-- row -->
@endsection
