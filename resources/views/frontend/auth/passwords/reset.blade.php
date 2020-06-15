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
                    <x-forms.post :action="route('frontend.auth.password.update')">
                        <input type="hidden" name="token" value="{{ $token }}" />

                        <x-forms.group for="email" labelClass="col-md-4 col-form-label text-md-right" bodyClass="col-md-6" :label="__('E-mail Address')">
                            <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ $email ?? old('email') }}" required autofocus autocomplete="email" />
                        </x-forms.group>

                        <x-forms.group for="password" labelClass="col-md-4 col-form-label text-md-right" bodyClass="col-md-6" :label="__('Password')">
                            <input type="password" id="password" name="password" class="form-control" required autocomplete="password" />
                        </x-forms.group>

                        <x-forms.group for="password_confirmation" labelClass="col-md-4 col-form-label text-md-right" bodyClass="col-md-6" :label="__('Confirm Password')">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password" />
                        </x-forms.group>

                        <x-forms.group :noLabel="true" groupClass="form-group row mb-0" bodyClass="col-md-6 offset-md-4">
                            <button class="btn btn-primary" type="submit">{{ __('Reset Password') }}</button>
                        </x-forms.group>
                    </x-forms.post>
                </x-slot>
            </x-frontend.card>
        </div><!--col-md-8-->
    </div><!--row-->
@endsection
