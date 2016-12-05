<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', app_name())</title>

        <!-- Styles -->
        @yield('before-styles-end')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        @langRTL
            {{ Html::style(elixir('css/backend-rtl.css')) }}
            {{ Html::style(elixir('css/rtl.css')) }}
        @else
            {{ Html::style(elixir('css/backend.css')) }}
        @endif

        @yield('after-styles-end')

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/css/bootstrap-datetimepicker.min.css">
        @include('log-viewer::_template.style')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            {{ Html::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
            {{ Html::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}
        <![endif]-->

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body class="skin-{{ config('backend.theme') }} {{ config('backend.layout') }}">
        @include('includes.partials.logged-in-as')

        <div class="wrapper">
            @include('backend.includes.header')
            @include('backend.includes.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('page-header')

                    {{-- Change to Breadcrumbs::render() if you want it to error to remind you to create the breadcrumbs for the given route --}}
                    {!! Breadcrumbs::renderIfExists() !!}
                </section>

                <!-- Main content -->
                <section class="content">
                    @include('includes.partials.messages')
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            @include('backend.includes.footer')
        </div><!-- ./wrapper -->

        <!-- JavaScripts -->
        @yield('before-scripts-end')
        {{ Html::script(elixir('js/backend.js')) }}
        @yield('after-scripts-end')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.1/moment-with-locales.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/js/bootstrap-datetimepicker.min.js"></script>
        <script>
            Chart.defaults.global.responsive      = true;
            Chart.defaults.global.scaleFontFamily = "'Source Sans Pro'";
            Chart.defaults.global.animationEasing = "easeOutQuart";
        </script>
    </body>
</html>
