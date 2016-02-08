    <div class="pull-right" style="margin-bottom:10px">
        <div class="btn-group">
          <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              {{ trans('menus.backend.access.users.main') }} <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('admin.access.users.index') }}">{{ trans('menus.backend.access.users.all') }}</a></li>

            @permission('create-users')
                <li><a href="{{ route('admin.access.users.create') }}">{{ trans('menus.backend.access.users.create') }}</a></li>
            @endauth

            <li class="divider"></li>
            <li><a href="{{ route('admin.access.users.deactivated') }}">{{ trans('menus.backend.access.users.deactivated') }}</a></li>
            <li><a href="{{ route('admin.access.users.deleted') }}">{{ trans('menus.backend.access.users.deleted') }}</a></li>
          </ul>
        </div><!--btn group-->

        <div class="btn-group">
          <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              {{ trans('menus.backend.access.roles.main') }} <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('admin.access.roles.index') }}">{{ trans('menus.backend.access.roles.all') }}</a></li>

            @permission('create-roles')
                <li><a href="{{ route('admin.access.roles.create') }}">{{ trans('menus.backend.access.roles.create') }}</a></li>
            @endauth
          </ul>
        </div><!--btn group-->

        <div class="btn-group">
          <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              {{ trans('menus.backend.access.permissions.main') }} <span class="caret"></span>
          </button>
          <ul class="dropdown-menu pull-right" role="menu">

            @permission('create-permission-groups')
                <li><a href="{{ route('admin.access.roles.permission-group.create') }}">{{ trans('menus.backend.access.permissions.groups.create') }}</a></li>
            @endauth

            @permission('create-permissions')
                <li><a href="{{ route('admin.access.roles.permissions.create') }}">{{ trans('menus.backend.access.permissions.create') }}</a></li>
            @endauth

            @permissions(['create-permission-groups', 'create-permissions'])
                <li class="divider"></li>
            @endauth

            <li><a href="{{ route('admin.access.roles.permissions.index') }}#all-permissions">{{ trans('menus.backend.access.permissions.all') }}</a></li>
            <li><a href="{{ route('admin.access.roles.permissions.index') }}">{{ trans('menus.backend.access.permissions.groups.all') }}</a></li>
          </ul>
        </div><!--btn group-->
    </div><!--pull right-->

    <div class="clearfix"></div>
