@inject('roles', 'App\Repositories\Backend\Role\RoleRepositoryContract')

@extends ('backend.layouts.master')

@section ('title', trans('menus.permission_management'))

@section('page-header')
    <h1>
        {{ trans('menus.user_management') }}
        <small>{{ trans('menus.permission_management') }}</small>
    </h1>
@endsection

@section('after-styles-end')
    {!! HTML::style('css/plugin/nestable/jquery.nestable.css') !!}
@stop

@section ('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li>{!! link_to_route('admin.access.users.index', trans('menus.user_management')) !!}</li>
    <li class="active">{!! link_to_route('admin.access.roles.permissions.index', trans('menus.permission_management')) !!}</li>
@stop

@section('content')
    @include('backend.access.includes.partials.header-buttons')

    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#groups" aria-controls="groups" role="tab" data-toggle="tab">Groups</a></li>
            <li role="presentation"><a href="#permissions" aria-controls="permissions" role="tab" data-toggle="tab">Permissions</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="groups" style="padding-top:20px">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="alert alert-info">
                            <i class="fa fa-info-circle"></i> This section allows you to organize your permissions into groups to stay organized. Regardless of the group, the permissions are still individually assigned to each role.
                        </div><!--alert info-->

                        <div class="dd permission-hierarchy">
                            <ol class="dd-list">
                                @foreach ($groups as $group)
                                    <li class="dd-item" data-id="{!! $group->id !!}">
                                        <div class="dd-handle">{!! $group->name !!} <span class="pull-right">{!! $group->permissions->count() !!} permissions</span></div>

                                        @if ($group->children->count())
                                            <ol class="dd-list">
                                                @foreach($group->children as $child)
                                                    <li class="dd-item" data-id="{!! $child->id !!}">
                                                        <div class="dd-handle">{!! $child->name !!} <span class="pull-right">{!! $child->permissions->count() !!} permissions</span></div>
                                                    </li>
                                                @endforeach
                                            </ol>
                                    </li>
                                    @else
                                    </li>
                                    @endif
                                @endforeach
                            </ol>
                        </div><!--master-list-->
                    </div><!--col-lg-4-->

                    <div class="col-lg-6">
                        <div class="alert alert-info">
                            <i class="fa fa-info-circle"></i> If you performed operations in the hierarchy section without refreshing this page, you will need to refresh to reflect the changes here.
                        </div><!--alert info-->

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{ trans('crud.permissions.groups.name') }}</th>
                                <th>{{ trans('crud.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($groups as $group)
                                <tr>
                                    <td>
                                        {!! $group->name !!}

                                        @if ($group->permissions->count())
                                            <div style="padding-left:40px;font-size:.8em">
                                                @foreach ($group->permissions as $permission)
                                                    {!! $permission->display_name !!}<br/>
                                                @endforeach
                                            </div>
                                        @endif
                                    </td>
                                    <td>{!! $group->action_buttons !!}</td>
                                </tr>

                                @if ($group->children->count())
                                    @foreach ($group->children as $child)
                                        <tr>
                                            <td style="padding-left:40px">
                                                <em>{!! $child->name !!}</em>

                                                @if ($child->permissions->count())
                                                    <div style="padding-left:40px;font-size:.8em">
                                                        @foreach ($child->permissions as $permission)
                                                            {!! $permission->display_name !!}<br/>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{!! $child->action_buttons !!}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div><!--col-lg-8-->
                </div><!--row-->

            </div><!--groups-->

            <div role="tabpanel" class="tab-pane" id="permissions" style="padding-top:20px">

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('crud.permissions.permission') }}</th>
                        <th>{{ trans('crud.permissions.name') }}</th>
                        <th>{{ trans('crud.permissions.users') }}</th>
                        <th>{{ trans('crud.permissions.roles') }}</th>
                        <th>{{ trans('crud.permissions.group') }}</th>
                        <th>{{ trans('crud.permissions.group-sort') }}</th>
                        <th>{{ trans('crud.permissions.system') }}</th>
                        <th>{{ trans('crud.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{!! $permission->name !!}</td>
                                <td>{!! $permission->display_name !!}</td>
                                <td>
                                    @if (count($permission->users))
                                        @foreach($permission->users as $user)
                                            {!! $user->name !!}<br/>
                                        @endforeach
                                    @else
                                        <span class="label label-danger">None</span>
                                    @endif
                                </td>
                                <td>
                                    {!! $roles->findOrThrowException(1)->name !!}<br/>
                                    @if (count($permission->roles))
                                        @foreach($permission->roles as $role)
                                            {!! $role->name !!}<br/>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if ($permission->group)
                                        {!! $permission->group->name !!}
                                    @else
                                        <span class="label label-danger">None</span>
                                    @endif
                                </td>
                                <td>{!! $permission->sort !!}</td>
                                <td>{!! $permission->system_label !!}</td>
                                <td>{!! $permission->action_buttons !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pull-left">
                    {{ $permissions->total() }} {{ trans('crud.permissions.total') }}
                </div>

                <div class="pull-right">
                    {{ $permissions->render() }}
                </div>

                <div class="clearfix"></div>

            </div><!--permissions-->
        </div>
    </div><!--permission tabs-->
@stop

@section('after-scripts-end')
    {!! HTML::script('js/plugin/nestable/jquery.nestable.js') !!}

    <script>
        $(function() {
            var hierarchy = $('.permission-hierarchy');
            hierarchy.nestable({maxDepth:2});

            hierarchy.on('change', function() {
                $.ajax({
                    url : "{!! route('admin.access.roles.groups.update-sort') !!}",
                    type: "post",
                    data : {data:hierarchy.nestable('serialize')},
                    success: function(data) {
                        if (data.status == "OK")
                            toastr.success("Hierarchy successfully saved.");
                        else
                            toastr.error("An unknown error occurred.");
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.error("An unknown error occurred: " + errorThrown);
                    }
                });
            });
        });
    </script>
@stop