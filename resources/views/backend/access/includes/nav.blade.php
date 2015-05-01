    <nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{!! route('access.users.index') !!}">Access</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>{!! link_to_route('access.users.index', 'Home') !!}</li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Users <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                           <li><a href="{{route('access.users.index')}}">All Users</a></li>
                           <li><a href="{{route('access.users.create')}}">Create User</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Roles <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                           <li><a href="{{route('access.roles.index')}}">All Roles</a></li>
                           <li><a href="{{route('access.roles.create')}}">Create Role</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Permissions <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                           <li><a href="{{route('access.roles.permissions.index')}}">All Permissions</a></li>
                           <li><a href="{{route('access.roles.permissions.create')}}">Create Permission</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{Access::user()->name}} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                           <li>{!! link_to('auth/logout', 'Logout') !!}</li>
                        </ul>
                    </li>
				</ul>
			</div>
		</div>
	</nav>