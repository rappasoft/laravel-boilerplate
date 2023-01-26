<header class="header header-sticky d-print-none">
    <div class="container-fluid">

        <button class="header-toggler px-md-0 me-md-3" type="button"
                onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <i class="icon icon-lg cil-menu"></i>
        </button>

        <a class="header-brand d-md-none" href="#">
            LOGO
        </a>

        <ul class="header-nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link" href="{{ route('frontend.index') }}">@lang('Home')</a></li>
            @if(config('boilerplate.locale.status') && count(config('boilerplate.locale.languages')) > 1)
                <li class="nav-item dropdown d-flex align-items-center">
                    <x-utils.link
                        :text="__(getLocaleName(app()->getLocale()))"
                        right="true"
                        class="nav-link dropdown-toggle"
                        data-coreui-toggle="dropdown"
                        role="button"
                        aria-haspopup="true"
                        aria-expanded="false"/>

                    @include('includes.partials.lang')
                </li>
            @endif
        </ul>

        <!-- Space Between -->
        <nav class="header-nav ms-auto me-4">
        </nav>
        @include('backend.includes.partials.header_alerts')

        <!-- Avatar and Menu -->
        <ul class="header-nav me-4">
            <li class="nav-item dropdown d-flex align-items-center">
                <x-utils.link class="nav-link py-0" data-coreui-toggle="dropdown" href="#"
                                               role="button"
                                               aria-haspopup="true" aria-expanded="false">
                    <x-slot name="text">
                        <div class="avatar avatar-md">
                            <img class="avatar-img" src="{{ $logged_in_user->avatar }}"
                                 alt="{{ $logged_in_user->email ?? '' }}">
                        </div>
                    </x-slot>
                </x-utils.link>

                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-light py-2">
                        <strong>@lang('Account')</strong>
                    </div>
                    <x-utils.dropdown-form
                        :href="route('frontend.auth.logout')"
                        :text="__('Logout')"
                        name="logout"
                        icon="fa-solid fa-arrow-right-from-bracket fa-rotate-180 me-2"
                    />
                </div>
            </li>
        </ul>
    </div>

    <div class="header-divider"></div>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            @include('backend.includes.partials.breadcrumbs')
        </nav>
        <div class="me-md-3">
            @yield('breadcrumb-links')
        </div>
    </div>
</header>
