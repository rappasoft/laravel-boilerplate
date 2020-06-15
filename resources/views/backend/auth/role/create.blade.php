@extends('backend.layouts.app')

@section('title', __('Create Role'))

@section('content')
    <x-forms.post :action="route('admin.auth.role.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Role')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.role.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <x-forms.group for="name" :label="__('Name')">
                    <x-forms.text name="name" :placeholder="__('Name')" :value="old('name')" required />
                </x-forms.group>

                @include('backend.auth.includes.permissions')
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">{{ __('Create Role') }}</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
