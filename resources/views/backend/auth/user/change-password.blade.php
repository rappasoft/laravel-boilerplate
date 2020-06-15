@extends('backend.layouts.app')

@section('title', __('Change Password for :name', ['name' => $user->name]))

@section('content')
    <x-forms.patch :action="route('admin.auth.user.change-password.update', $user)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Change Password for :name', ['name' => $user->name])
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <x-forms.group for="password" :label="__('Password')">
                    <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" required autocomplete="new-password" />
                </x-forms.group>

                <x-forms.group for="password_confirmation" :label="__('Confirm Password')">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Password Confirmation') }}" required autocomplete="new-password" />
                </x-forms.group>
            </x-slot>

            <x-slot name="footer">
                <x-forms.submit :text="__('Update')" />
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
