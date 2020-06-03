@extends('backend.layouts.app')

@section('title', __('Update Role'))

@section('content')
    <x-forms.patch :action="route('admin.auth.role.update', $role)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Role')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.role.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <x-forms.group for="name" :label="__('Name')">
                    <x-forms.text name="name" :placeholder="__('Name')" :value="old('name') ?? $role->name" required />
                </x-forms.group>

                @include('backend.auth.includes.permissions')
            </x-slot>

            <x-slot name="footer">
                <x-forms.submit :text="__('Update Role')" />
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
