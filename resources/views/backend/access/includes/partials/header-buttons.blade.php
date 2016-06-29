<div class="pull-right mb-10">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.access.users.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.access.users.index', trans('menus.backend.access.users.all')) }}</li>

            @permission('create-users')
            <li>{{ link_to_route('admin.access.users.create', trans('menus.backend.access.users.create')) }}</li>
            @endauth

            <li class="divider"></li>
            <li>{{ link_to_route('admin.access.users.deactivated', trans('menus.backend.access.users.deactivated')) }}</li>
            <li>{{ link_to_route('admin.access.users.deleted', trans('menus.backend.access.users.deleted')) }}</li>
        </ul>
    </div><!--btn group-->

    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.access.roles.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.access.roles.index', trans('menus.backend.access.roles.all')) }}</li>

            @permission('create-roles')
            <li>{{ link_to_route('admin.access.roles.create', trans('menus.backend.access.roles.create')) }}</li>
            @endauth
        </ul>
    </div><!--btn group-->

    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.access.permissions.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu pull-right" role="menu">
            @permission('create-permission-groups')
            <li>{{ link_to_route('admin.access.roles.permission-group.create', trans('menus.backend.access.permissions.groups.create')) }}</li>
            @endauth

            @permission('create-permissions')
            <li>{{ link_to_route('admin.access.roles.permissions.create', trans('menus.backend.access.permissions.create')) }}</li>
            @endauth

            @permissions(['create-permission-groups', 'create-permissions'])
            <li class="divider"></li>
            @endauth

            {{-- Keep this an HTML link because we need the hash --}}
            <li><a href="{{ route('admin.access.roles.permissions.index') }}#all-permissions">{{ trans('menus.backend.access.permissions.all') }}</a></li>
            <li>{{ link_to_route('admin.access.roles.permissions.index', trans('menus.backend.access.permissions.groups.all')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>