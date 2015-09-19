    <div class="pull-right" style="margin-bottom:10px">
        <div class="btn-group">
          <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              {{ trans('menus.header_buttons.users.button') }} <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{route('admin.access.users.index')}}">{{ trans('menus.header_buttons.users.all') }}</a></li>

            @if (access()->can('create-user'))
                <li><a href="{{route('admin.access.users.create')}}">{{ trans('menus.create_user') }}</a></li>
            @endif

            <li class="divider"></li>
            <li><a href="{{route('admin.access.users.deactivated')}}">{{ trans('menus.deactivated_users') }}</a></li>
            <li><a href="{{route('admin.access.users.banned')}}">{{ trans('menus.banned_users') }}</a></li>
            <li><a href="{{route('admin.access.users.deleted')}}">{{ trans('menus.deleted_users') }}</a></li>
          </ul>
        </div>

        <div class="btn-group">
          <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              {{ trans('menus.header_buttons.roles.button') }} <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{route('admin.access.roles.index')}}">{{ trans('menus.header_buttons.roles.all') }}</a></li>
            <li><a href="{{route('admin.access.roles.create')}}">{{ trans('menus.create_role') }}</a></li>
          </ul>
        </div>

        <div class="btn-group">
          <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              {{ trans('menus.header_buttons.permissions.button') }} <span class="caret"></span>
          </button>
          <ul class="dropdown-menu pull-right" role="menu">
            <li><a href="{{route('admin.access.roles.permission-group.create')}}">{{ trans('menus.create_permission_group') }}</a></li>
            <li><a href="{{route('admin.access.roles.permissions.create')}}">{{ trans('menus.create_permission') }}</a></li>
            <li class="divider"></li>
            <li><a href="{{route('admin.access.roles.permissions.index')}}">{{ trans('menus.header_buttons.permissions.all') }}</a></li>
            <li><a href="{{route('admin.access.roles.permissions.index')}}">{{ trans('menus.header_buttons.permissions.groups.all') }}</a></li>
          </ul>
        </div>
    </div>

    <div class="clearfix"></div>