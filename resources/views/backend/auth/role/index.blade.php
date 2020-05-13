@extends('backend.layouts.app')

@section('content')
    <x-backend.card>
        <x-slot name="header">
            {{ __('Role Management') }}
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.auth.role.create')" :text="__('Create Role')" />
        </x-slot>

        <x-slot name="body">
            <livewire:roles-table />
        </x-slot>
    </x-backend.card>
@endsection
