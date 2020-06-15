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
                    <input type="email" name="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" required />
                </x-forms.group>

                <x-forms.group for="password" :label="__('Password')">
                    <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" required autocomplete="new-password" />
                </x-forms.group>

                <x-forms.group for="password_confirmation" :label="__('Confirm Password')">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Password Confirmation') }}" required autocomplete="new-password" />
                </x-forms.group>

                <x-forms.group for="active" :label="__('Active')">
                    <div class="form-check">
                        <input name="active" id="active" class="form-check-input" type="checkbox" value="1" {{ old('active', true) ? 'checked' : '' }} />
                    </div><!--form-check-->
                </x-forms.group>

                <div x-data="{ emailVerified : false }">
                    <x-forms.group for="email_verified" :label="__('E-mail Verified')">
                        <div class="form-check">
                            <input
                                type="checkbox"
                                name="email_verified"
                                id="email_verified"
                                value="1"
                                class="form-check-input"
                                @click="emailVerified = !emailVerified"
                                {{ old('email_verified') ? 'checked' : '' }} />
                        </div><!--form-check-->
                    </x-forms.group>

                    <div x-show="!emailVerified">
                        <x-forms.group for="send_confirmation_email" :label="__('Send Confirmation E-mail')">
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    name="send_confirmation_email"
                                    id="send_confirmation_email"
                                    value="1"
                                    class="form-check-input"
                                    {{ old('send_confirmation_email') ? 'checked' : '' }} />
                            </div><!--form-check-->
                        </x-forms.group>
                    </div>
                </div>

                @include('backend.auth.includes.roles')
                @include('backend.auth.includes.permissions')
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">{{ __('Create User') }}</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
