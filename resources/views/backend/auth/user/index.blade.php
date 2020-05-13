@extends('backend.layouts.app')

@section('content')
    <x-backend.card>
        <x-slot name="header">
            {{ __('Active Users') }}
        </x-slot>

        <x-slot name="body">

        </x-slot>
    </x-backend.card>
@endsection
