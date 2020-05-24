@extends('backend.layouts.app')

@section('content')
    <x-backend.card>
        <x-slot name="header">
            {{ __('User Management') }}
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.auth.user.create')" :text="__('Create User')" />
        </x-slot>

        <x-slot name="body">
            <livewire:users-table />
        </x-slot>
    </x-backend.card>
@endsection
