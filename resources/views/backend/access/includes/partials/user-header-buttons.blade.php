<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.access.user.index', __('All Users'), [], ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('admin.access.user.create', __('Create User'), [], ['class' => 'btn btn-success btn-xs']) }}
    {{ link_to_route('admin.access.user.deactivated', __('Deactivated Users'), [], ['class' => 'btn btn-warning btn-xs']) }}
    {{ link_to_route('admin.access.user.deleted', __('Deleted Users'), [], ['class' => 'btn btn-danger btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ __('Users') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.access.user.index', __('All Users')) }}</li>
            <li>{{ link_to_route('admin.access.user.create', __('Create User')) }}</li>
            <li class="divider"></li>
            <li>{{ link_to_route('admin.access.user.deactivated', __('Deactivated Users')) }}</li>
            <li>{{ link_to_route('admin.access.user.deleted', __('Deleted Users')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>