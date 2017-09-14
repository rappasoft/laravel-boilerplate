<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#frontend-navbar-collapse">
                <span class="sr-only">{{ trans('labels.general.toggle_navigation') }}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            {{ link_to_route('frontend.index', app_name(), [], ['class' => 'navbar-brand']) }}
        </div><!--navbar-header-->

        <div class="collapse navbar-collapse" id="frontend-navbar-collapse">
            <!-- Macros Menu -->
            {!! $macros->render() !!}
            <!-- /Macros Menu -->

            <!-- Frontend Navbar -->
            {!! $frontend->render() !!}
            <!-- /Frontend Navbar -->
        </div><!--navbar-collapse-->
    </div><!--container-->
</nav>