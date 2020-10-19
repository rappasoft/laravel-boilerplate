@extends('frontend.layouts.app')

@section('title', __('Two Factor Authentication is required'))

@section('content')
    <div class="container py-4">
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

                            <div class="form-group row">
                                <label for="{{ $input }}" class="col-md-4 col-form-label text-md-right">@lang('Authentication Code')</label>

                                <div class="col-md-6">
                                    <input type="text"
                                           name="{{ $input }}"
                                           id="{{ $input }}"
                                           class="form-control {{ $error ? 'is-invalid' : '' }}"
                                           placeholder="123456"
                                           minlength="6"
                                           required />

                                    @if($error)
                                        <div class="invalid-feedback">
                                            {{ trans('laraguard::validation.totp_code') }}
                                        </div>
                                    @endif
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-primary" type="submit">@lang('Confirm Code')</button>
                                </div>
                            </div><!--form-group-->
                        </x-forms.post>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-8-->
        </div><!--row-->
    </div><!--container-->
@endsection
