@extends('frontend.layouts.app')

@section('title', __('Two Factor Authentication is required'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-frontend.card>
                <x-slot name="header">
                    @lang('Two Factor Authentication is required')
                </x-slot>

                <x-slot name="body">
                    <p>@lang('To continue, open up your Authenticator app and issue your 2FA code.')</p>

                    <x-forms.post :action="$action">
                        @foreach((array)$credentials as $name => $value)
                            <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                        @endforeach

                        @if($remember)
                            <input type="hidden" name="remember" value="on">
                        @endif

                        <x-forms.group labelClass="col-md-4 col-form-label text-md-right" bodyClass="col-md-6" for="{{ $input }}" :label="__('Authentication Code')">
                            <x-forms.text
                                :name="$input"
                                :id="$input"
                                :class="$error ? 'is-invalid' : ''"
                                placeholder="123456"
                                minlength="6"
                                required />

                            @if($error)
                                <div class="invalid-feedback">
                                    {{ trans('laraguard::validation.totp_code') }}
                                </div>
                            @endif
                        </x-forms.group>

                        <x-forms.group :noLabel="true" groupClass="form-group row mb-0" bodyClass="col-md-6 offset-md-4">
                            <button class="btn btn-primary" type="submit">{{ __('Confirm Code') }}</button>
                        </x-forms.group>
                    </x-forms.post>
                </x-slot>
            </x-frontend.card>
        </div><!--col-md-8-->
    </div><!--row-->
@endsection
