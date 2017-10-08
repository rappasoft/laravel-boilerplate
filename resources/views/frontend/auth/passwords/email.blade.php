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

                    <form action="{{ route('frontend.auth.password.email.post') }}" method="post">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">{{ __('validation.attributes.frontend.email') }}</label>
                                    <input type="email" name="email" id="email" class="form-control" maxlength="191" placeholder="{{ __('validation.attributes.frontend.email') }}" required="required" autofocus="autofocus" />
                                </div><!--form-group-->
                            </div>
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <button type="submit" name="button" class="btn btn-success">
                                        <i class='fa fa-check'></i> {{ __('labels.frontend.passwords.send_password_reset_link_button') }}
                                    </button>
                                </div>
                            </div><!--col-->
                        </div><!--row-->
                    </form>
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col-6 -->
    </div><!-- row -->
@endsection
