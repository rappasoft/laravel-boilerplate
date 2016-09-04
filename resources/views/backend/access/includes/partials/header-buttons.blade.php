<div class="pull-right mb-10">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.access.users.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.access.user.index', trans('menus.backend.access.users.all')) }}</li>

            @permission('manage-users')
                <li>{{ link_to_route('admin.access.user.create', trans('menus.backend.access.users.create')) }}</li>
            @endauth

            <li class="divider"></li>
            <li>{{ link_to_route('admin.access.user.deactivated', trans('menus.backend.access.users.deactivated')) }}</li>
            <li>{{ link_to_route('admin.access.user.deleted', trans('menus.backend.access.users.deleted')) }}</li>
        </ul>
    </div><!--btn group-->

    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.access.roles.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.access.role.index', trans('menus.backend.access.roles.all')) }}</li>

            @permission('manage-roles')
                <li>{{ link_to_route('admin.access.role.create', trans('menus.backend.access.roles.create')) }}</li>
            @endauth
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
