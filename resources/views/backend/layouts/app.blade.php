<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title')</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/icon/favicon.ico') }}">
    @yield('meta')
    @stack('before-styles')
    @vite(['resources/sass/backend/app.scss'])
    <livewire:styles/>
    @stack('after-styles')
</head>
<body class="dark-theme">
@include('backend.includes.sidebar')
@if(config('boilerplate.core_ui_pro'))
    @include('backend.includes.aside')
@endif
<div class="wrapper d-flex flex-column min-vh-100 bg-light dark:bg-transparent">
    @include('backend.includes.header')
    @include('includes.partials.read-only')
    @include('includes.partials.logged-in-as')
    @include('includes.partials.announcements')

    <div class="body flex-grow-1 px-3 py-4">
        <div class="container-lg">
            @include('includes.partials.messages')
            @yield('content')
        </div><!--container-fluid-->
    </div><!--c-body-->

    @include('backend.includes.footer')
</div><!--c-wrapper-->

@stack('before-scripts')
@vite(['resources/js/backend/app.js'])
<livewire:scripts/>
@stack('after-scripts')
</body>
</html>
