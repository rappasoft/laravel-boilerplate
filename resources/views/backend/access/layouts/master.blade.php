<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="_token" content="{{ csrf_token() }}">

	<title>@yield('title', 'Access')</title>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    @yield('before-styles-end')

    <style>
        .footer {margin-top:20px}
    </style>

    @yield('after-styles-end')

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
    @include('backend.access.includes.nav')

    <div class="container-fluid">
        @yield('breadcrumbs')
        @include('backend.access.includes.partials.messages')
	    @yield('content')
	</div><!-- container -->

	<div class="container-fluid footer">
	    <div class="col-lg-12 text-right well well-sm">
	        Copyright &copy; {{date('Y')}} {{Config::get('access.general.company_name')}}
	    </div>
	</div><!-- container -->

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    @yield('before-scripts-end')

	@yield('after-scripts-end')
</body>
</html>