<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    {{ link_to_route('frontend.index', app_name(), [], ['class' => 'navbar-brand']) }}

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('labels.general.toggle_navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
            @if (config('locale.status') && count(config('locale.languages')) > 1)
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownLanguageLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">{{ __('menus.language-picker.language') }} ({{strtoupper(\App::getLocale())}})</a>

                    @include('includes.partials.lang')
                </li>
            @endif

            @auth
                <li class="nav-item">{{ link_to_route('frontend.user.dashboard', __('navs.frontend.dashboard'), [], ['class' => 'nav-link ' . active_class(Active::checkRoute('frontend.user.dashboard')) ]) }}</li>
            @endauth

            @guest
                <li class="nav-item">{{ link_to_route('frontend.auth.login', __('navs.frontend.login'), [], ['class' =>  'nav-link ' . active_class(Active::checkRoute('frontend.auth.login')) ]) }}</li>

                @if (config('access.registration'))
                    <li class="nav-item">{{ link_to_route('frontend.auth.register', __('navs.frontend.register'), [], ['class' =>  'nav-link ' . active_class(Active::checkRoute('frontend.auth.register')) ]) }}</li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">{{ $logged_in_user->name }}</a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                        @can('view backend')
                            {{ link_to_route('admin.dashboard', __('navs.frontend.user.administration'), [], ['class' => 'dropdown-item']) }}
                        @endcan

                        {{ link_to_route('frontend.user.account', __('navs.frontend.user.account'), [], ['class' => 'dropdown-item ' . active_class(Active::checkRoute('frontend.user.account')) ]) }}
                        {{ link_to_route('frontend.auth.logout', __('navs.general.logout'), [], ['class' => 'dropdown-item']) }}
                    </div>
                </li>
            @endguest

            <li class="nav-item">{{ link_to_route('frontend.contact', __('navs.frontend.contact'), [], ['class' => 'nav-link ' . active_class(Active::checkRoute('frontend.contact')) ]) }}</li>
        </ul>
    </div>
</nav>
