@extends('frontend.layouts.app')

@section('title', __('Reset Password'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-frontend.card>
                <x-slot name="header">
                    @lang('Reset Password')
                </x-slot>

                <x-slot name="body">
                    <x-forms.post :action="route('frontend.auth.password.email')">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail Address') }}</label>

                            <div class="col-md-6">
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="{{ __('E-mail Address') }}" required autofocus autocomplete="email" />
                            </div>
                        </div><!--form-group-->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary" type="submit">{{ __('Send Password Reset Link') }}</button>
                            </div>
                        </div><!--form-group-->
                    </x-forms.post>
                </x-slot>
            </x-frontend.card>
        </div><!--col-md-8-->
    </div><!--row-->
@endsection
