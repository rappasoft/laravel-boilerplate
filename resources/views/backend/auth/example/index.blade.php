@extends('backend.layouts.app')

@section('title', __('Example Management'))

@section('breadcrumb-links')
    @include('backend.auth.example.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Example Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.auth.example.create')"
                    :text="__('Create Example')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:backend.examples-table/>
        </x-slot>
    </x-backend.card>
@endsection
