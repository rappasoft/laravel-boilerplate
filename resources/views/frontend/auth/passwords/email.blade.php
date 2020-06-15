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
                        <x-forms.group labelClass="col-md-4 col-form-label text-md-right" bodyClass="col-md-6" for="email" :label="__('E-mail Address')">
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus autocomplete="email" />
                        </x-forms.group>

                        <x-forms.group :noLabel="true" groupClass="form-group row mb-0" bodyClass="col-md-6 offset-md-4">
                            <button class="btn btn-primary" type="submit">{{ __('Send Password Reset Link') }}</button>
                        </x-forms.group>
                    </x-forms.post>
                </x-slot>
            </x-frontend.card>
        </div><!--col-md-8-->
    </div><!--row-->
@endsection
