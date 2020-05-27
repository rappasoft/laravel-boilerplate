@extends('backend.layouts.app')

@section('title', __('Create User'))

@section('content')
    <x-forms.post :action="route('admin.auth.user.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create User')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <x-forms.group for="name" :label="__('Name')">
                    <x-forms.text name="name" :placeholder="__('Name')" :value="old('name')" required />
                </x-forms.group>

                <x-forms.group for="email" :label="__('E-mail Address')">
                    <x-forms.email name="email" :placeholder="__('E-mail Address')" :value="old('email')" required />
                </x-forms.group>

                <x-forms.group for="password" :label="__('Password')">
                    <x-forms.password name="password" id="password" :placeholder="__('Password')" required autocomplete="new-password" />
                </x-forms.group>

                <x-forms.group for="password_confirmation" :label="__('Confirm Password')">
                    <x-forms.password name="password_confirmation" id="password_confirmation" :placeholder="__('Password Confirmation')" required autocomplete="new-password" />
                </x-forms.group>
            </x-slot>

            <x-slot name="footer">
                <x-forms.submit :text="__('Create User')" />
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
