<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}" />
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'Default Description')">
        <meta name="author" content="@yield('author', 'Anthony Rappa')">
        @yield('meta')

        @yield('before-styles-end')
        {!! HTML::style(elixir('css/frontend.css')) !!}
        @yield('after-styles-end')

        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

        <!-- Icons-->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        {!! HTML::script("js/vendor/modernizr-2.8.3.min.js") !!}
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        @include('frontend.includes.nav')

        <div class="container-fluid">
            @include('includes.partials.messages')
            @yield('content')
        </div><!-- container -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{asset('js/vendor/jquery-1.11.2.min.js')}}"><\/script>')</script>
        {!! HTML::script('js/vendor/bootstrap.min.js') !!}

        @yield('before-scripts-end')
        {!! HTML::script(elixir('js/frontend.js')) !!}
        @yield('after-scripts-end')

        @include('includes.partials.ga')
    </body>
</html>
