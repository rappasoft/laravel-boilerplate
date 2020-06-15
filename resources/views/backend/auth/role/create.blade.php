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
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">{{ __('Name') }}</label>

                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required />
                    </div>
                </div>

                @include('backend.auth.includes.permissions')
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">{{ __('Create Role') }}</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
