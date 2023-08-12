@extends('backend.layouts.app')

@section('title', __('User Management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('User Types')
        </x-slot>

    <x-slot name="body">
        <div id="piechart"></div>
        <div id="barchart"></div>
    </x-slot>
    </x-backend.card>
@endsection
