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
            <ul class="nav navbar-nav">

                @if (config('locale.status') && count(config('locale.languages')) > 1)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-language"></i> {{ trans('menus.language-picker.language') }} <span class="caret"></span>
                        </a>
                        @include('includes.partials.lang')
                    </li>
                @endif

                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-default">0</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="header">{{ trans_choice('strings.backend.general.you_have.messages', 0, ['number' => 0]) }}</li>
                        <li class="footer">
                            {{ link_to('#', trans('strings.backend.general.see_all.messages')) }}
                        </li>
                    </ul>
                </li><!-- /.messages-menu -->

                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-default">0</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="header">{{ trans_choice('strings.backend.general.you_have.notifications', 0) }}</li>
                        <li class="footer">
                            {{ link_to('#', trans('strings.backend.general.see_all.notifications')) }}
                        </li>
                    </ul>
                </li><!-- /.notifications-menu -->

                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-default">0</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="header">{{ trans_choice('strings.backend.general.you_have.tasks', 0, ['number' => 0]) }}</li>
                        <li class="footer">
                            {{ link_to('#', trans('strings.backend.general.see_all.tasks')) }}
                        </li>
                    </ul>
                </li><!-- /.tasks-menu -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ access()->user()->picture }}" class="user-image" alt="User Avatar"/>
                        <span class="hidden-xs">{{ access()->user()->name }}</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ access()->user()->picture }}" class="img-circle" alt="User Avatar" />
                            <p>
                                {{-- access()->user()->name }} - {{ implode(", ", access()->user()->roles->lists('name')->toArray()) --}}
                                <small>{{ trans('strings.backend.general.member_since') }} {{ access()->user()->created_at->format("m/d/Y") }}</small>
                            </p>
                        </li>

                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                {{ link_to('#', 'Link') }}
                            </div>
                            <div class="col-xs-4 text-center">
                                {{ link_to('#', 'Link') }}
                            </div>
                            <div class="col-xs-4 text-center">
                                {{ link_to('#', 'Link') }}
                            </div>
                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{!! route('frontend.index') !!}" class="btn btn-default btn-flat">
                                    <i class="fa fa-home"></i>
                                    {{ trans('navs.general.home') }}
                                </a>
                            </div>
                            <div class="pull-right">
                                <a href="{!! route('frontend.auth.logout') !!}" class="btn btn-danger btn-flat">
                                    <i class="fa fa-sign-out"></i>
                                    {{ trans('navs.general.logout') }}
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-custom-menu -->
    </nav>
</header>
