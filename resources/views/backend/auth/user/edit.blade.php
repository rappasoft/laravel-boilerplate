@extends('backend.layouts.app')

@section('title', __('Update User'))

@section('content')
    <x-forms.patch :action="route('admin.auth.user.update', $user)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update User')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <x-forms.group for="name" :label="__('Name')">
                    <x-forms.text name="name" :placeholder="__('Name')" :value="$user->name" required />
                </x-forms.group>

                <x-forms.group for="email" :label="__('E-mail Address')">
                    <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ $user->email }}" required />
                </x-forms.group>

                @if (!$user->isMasterAdmin())
                    @include('backend.auth.includes.roles')
                    @include('backend.auth.includes.permissions')
                @endif
            </x-slot>

            <x-slot name="footer">
                <x-forms.submit :text="__('Update User')" />
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
