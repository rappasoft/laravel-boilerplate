<header class="main-header">

    <a href="{{ route('frontend.index') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
           {{ substr(app_name(), 0, 1) }}
        </span>

        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            {{ app_name() }}
        </span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('labels.general.toggle_navigation') }}</span>
        </a>

        <div class="navbar-custom-menu">
            <!-- Backend Navbar -->
            {!! $backend->render() !!}
            <!-- /Backend Navbar -->
        </div><!-- /.navbar-custom-menu -->
    </nav>
</header>
