    <nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">{{ trans('labels.toggle_navigation') }}</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="">{{ app_name() }}</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>{!! link_to('/', trans('navs.home')) !!}</li>
					<li>{!! link_to('macros', trans('navs.macros')) !!}</li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ trans('menus.language-picker.language') }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li>{!! link_to('lang/en', trans('menus.language-picker.langs.en')) !!}</li>
							<li>{!! link_to('lang/es', trans('menus.language-picker.langs.es')) !!}</li>
							<li>{!! link_to('lang/fr-FR', trans('menus.language-picker.langs.fr-FR')) !!}</li>
							<li>{!! link_to('lang/it', trans('menus.language-picker.langs.it')) !!}</li>
							<li>{!! link_to('lang/pl', trans('menus.language-picker.langs.pl')) !!}</li>
							<li>{!! link_to('lang/pt-BR', trans('menus.language-picker.langs.pt-BR')) !!}</li>
                            <li>{!! link_to('lang/ru', trans('menus.language-picker.langs.ru')) !!}</li>
							<li>{!! link_to('lang/sv', trans('menus.language-picker.langs.sv')) !!}</li>
						</ul>
					</li>

					@if (Auth::guest())
						<li>{!! link_to('auth/login', trans('navs.login')) !!}</li>
						<li>{!! link_to('auth/register', trans('navs.register')) !!}</li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
							    <li>{!! link_to('dashboard', trans('navs.dashboard')) !!}</li>

								@if (access()->user()->canChangePassword())
							    	<li>{!! link_to('auth/password/change', trans('navs.change_password')) !!}</li>
								@endif

							    @permission('view-backend')
							        <li>{!! link_to_route('admin.dashboard', trans('navs.administration')) !!}</li>
							    @endauth

								<li>{!! link_to('auth/logout', trans('navs.logout')) !!}</li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
