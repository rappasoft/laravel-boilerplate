@extends('frontend.layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-frontend.card>
                <x-slot name="header">
                    @lang('Reset Password')
                </x-slot>

                <x-slot name="body">
                    <x-forms.post :action="route('frontend.auth.password.update')">
                        <x-forms.hidden name="token" :value="$token" />

                        <x-forms.group for="email" labelClass="col-md-4 col-form-label text-md-right" bodyClass="col-md-6" :label="__('E-mail Address')">
                            <x-forms.email id="email" name="email" :value="$email ?? old('email')" required autocomplete="email" autofocus />
                        </x-forms.group>

                        <x-forms.group for="password" labelClass="col-md-4 col-form-label text-md-right" bodyClass="col-md-6" :label="__('Password')">
                            <x-forms.password id="password" name="password" required autocomplete="password" />
                        </x-forms.group>

                        <x-forms.group for="password_confirmation" labelClass="col-md-4 col-form-label text-md-right" bodyClass="col-md-6" :label="__('Confirm Password')">
                            <x-forms.password id="password_confirmation" name="password_confirmation" required autocomplete="new-password" />
                        </x-forms.group>

                        <x-forms.group :noLabel="true" groupClass="form-group row mb-0" bodyClass="col-md-6 offset-md-4">
                            <x-forms.submit class="btn btn-primary" :text="__('Reset Password')" />
                        </x-forms.group>
                    </x-forms.post>
                </x-slot>
            </x-frontend.card>
        </div><!--col-md-8-->
    </div><!--row-->
@endsection
