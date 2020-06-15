@extends('frontend.layouts.app')

@section('title', __('Register'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-frontend.card>
                <x-slot name="header">
                    @lang('Register')
                </x-slot>

                <x-slot name="body">
                    <x-forms.post :action="route('frontend.auth.register')">
                        <x-forms.group labelClass="col-md-4 col-form-label text-md-right" bodyClass="col-md-6" for="name" :label="__('Name')">
                            <x-forms.text name="name" id="name" :value="old('name')" required autocomplete="name" autofocus />
                        </x-forms.group>

                        <x-forms.group labelClass="col-md-4 col-form-label text-md-right" bodyClass="col-md-6" for="email" :label="__('E-mail Address')">
                            <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" required autocomplete="email" />
                        </x-forms.group>

                        <x-forms.group labelClass="col-md-4 col-form-label text-md-right" bodyClass="col-md-6" for="password" :label="__('Password')">
                            <x-forms.password name="password" id="password" required autocomplete="new-password" />
                        </x-forms.group>

                        <x-forms.group labelClass="col-md-4 col-form-label text-md-right" bodyClass="col-md-6" for="password_confirmation" :label="__('Confirm Password')">
                            <x-forms.password name="password_confirmation" id="password_confirmation" required autocomplete="new-password" />
                        </x-forms.group>

                        <x-forms.group :noLabel="true" groupClass="form-group row mb-0" bodyClass="col-md-6 offset-md-4">
                            <x-forms.submit class="btn btn-primary" :text="__('Register')" />
                        </x-forms.group>
                    </x-forms.post>
                </x-slot>
            </x-frontend.card>
        </div><!--col-md-8-->
    </div><!--row-->
@endsection
