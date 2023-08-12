@extends('backend.layouts.app')

@section('title', __('User Management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('User Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.auth.user.create')"
                    :text="__('Create ')"
                />
                <x-utils.link
                    icon="cid-spreadsheet"
                    class="card-header-action"
                    :href="route('admin.auth.user.charts')"
                    :text="__('Charts')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <x-slot name="header">
                @lang('Total Users Count :')
                {{$count}}
            </x-slot>
            <livewire:backend.users-table />
        </x-slot>
    </x-backend.card>
@endsection
