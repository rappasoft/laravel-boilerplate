@extends('frontend.layouts.app')

@section('title', __('Login'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-frontend.card>
                <x-slot name="header">
                    @lang('Login')
                </x-slot>

                <x-slot name="body">
                    <x-forms.post :action="route('frontend.auth.login')">
                        <x-forms.group labelClass="col-md-4 col-form-label text-md-right" bodyClass="col-md-6" for="email" :label="__('E-mail Address')">
                            <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" required autofocus autocomplete="email" />
                        </x-forms.group>

                        <x-forms.group labelClass="col-md-4 col-form-label text-md-right" bodyClass="col-md-6" for="password" :label="__('Password')">
                            <input type="password" name="password" id="password" class="form-control" required autocomplete="current-password" />
                        </x-forms.group>

                        <x-forms.group noLabel="true" bodyClass="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input name="remember" id="remember" class="form-check-input" type="checkbox" {{ old('remember') ? 'checked' : '' }} />

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div><!--form-check-->
                        </x-forms.group>

                        <x-forms.group :noLabel="true" groupClass="form-group row mb-0" bodyClass="col-md-8 offset-md-4">
                            <x-forms.submit class="btn btn-primary" :text="__('Login')" />
                            <x-utils.link :href="route('frontend.auth.password.request')" class="btn btn-link" :text="__('Forgot Your Password?')" />
                        </x-forms.group>

                        <div class="text-center">
                            @include('frontend.auth.includes.social')
                        </div>
                    </x-forms.post>
                </x-slot>
            </x-frontend.card>
        </div><!--col-md-8-->
    </div><!--row-->
@endsection
