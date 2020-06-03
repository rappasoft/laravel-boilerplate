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

                <x-forms.group for="active" :label="__('Active')">
                     {{-- TODO: form-check still has a blank label --}}
                    <x-forms.form-check name="active" id="active" :checked="old('active')" :checked="true" value="1" />
                </x-forms.group>

                <div x-data="{ emailVerified : false }">
                    <x-forms.group for="email_verified" :label="__('E-mail Verified')">
                        {{-- TODO: form-check still has a blank label --}}
                        <x-forms.form-check name="email_verified" id="email_verified" :checked="old('email_verified')" value="1" @click="emailVerified = !emailVerified"  />
                    </x-forms.group>

                    <div x-show="!emailVerified">
                        <x-forms.group for="send_confirmation_email" :label="__('Send Confirmation E-mail')">
                            {{-- TODO: form-check still has a blank label --}}
                            <x-forms.form-check name="send_confirmation_email" id="send_confirmation_email" :checked="old('send_confirmation_email')" value="1" :checked="true" />
                        </x-forms.group>
                    </div>
                </div>

                @include('backend.auth.includes.roles')
                @include('backend.auth.includes.permissions')
            </x-slot>

            <x-slot name="footer">
                <x-forms.submit :text="__('Create User')" />
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
