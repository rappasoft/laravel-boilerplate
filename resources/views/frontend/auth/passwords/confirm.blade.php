@extends('frontend.layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-frontend.card>
                <x-slot name="header">
                    {{ __('Please confirm your password before continuing.') }}
                </x-slot>

                <x-slot name="body">
                    <x-forms.post :action="route('frontend.auth.password.confirm')">
                        <x-forms.group labelClass="col-md-4 col-form-label text-md-right" bodyClass="col-md-6" for="password" :label="__('Password')">
                            <x-forms.password name="password" required autocomplete="current-password" />
                        </x-forms.group>

                        <x-forms.group :noLabel="true" groupClass="form-group row mb-0" bodyClass="col-md-6 offset-md-4">
                            <x-forms.submit class="btn btn-primary" :text="__('Confirm Password')" />
                        </x-forms.group>
                    </x-forms.post>
                </x-slot>
            </x-frontend.card>
        </div><!--col-md-8-->
    </div><!--row-->
@endsection
