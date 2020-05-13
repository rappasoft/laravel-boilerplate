@extends('backend.layouts.app')

@section('content')
    <x-backend.card>
        <x-slot name="header">
            {{ __('Welcome :Name', ['name' => $logged_in_user->name]) }}
        </x-slot>

        <x-slot name="body">
            {{ __('Welcome to the Dashboard') }}
        </x-slot>
    </x-backend.card>
@endsection
