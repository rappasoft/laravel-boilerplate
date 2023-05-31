@extends('backend.layouts.app')

@section('title', __('Deleted Examples'))

@section('breadcrumb-links')
    @include('backend.auth.example.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted Examples')
        </x-slot>

        <x-slot name="body">
            <livewire:backend.examples-table status="deleted"/>
        </x-slot>
    </x-backend.card>
@endsection
