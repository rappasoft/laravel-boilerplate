<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ trans('installer.title') }}</title>

        <!-- Bootstrap -->
        <link href="http://bootswatch.com/flatly/bootstrap.min.css" rel="stylesheet">

        <!-- Main Style -->
        <link href="{{ asset('css/installer/style.css') }}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="login-body">
                <article class="container-login center-block">
                    <section>
                        @yield('container')
                    </section>
                </article>
            </div><!--login body-->
        </div><!--container-->
    </body>
</html>