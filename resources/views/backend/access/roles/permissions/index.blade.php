@inject('roles', 'App\Repositories\Backend\Access\Role\RoleRepositoryContract')

@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.permissions.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.access.permissions.management') }}</h1>
@endsection

@section('after-styles-end')
    {!! Html::style('css/backend/plugin/nestable/jquery.nestable.css') !!}
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.permissions.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#groups" aria-controls="groups" role="tab" data-toggle="tab">
                            {{ trans('labels.backend.access.permissions.tabs.groups') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#permissions" data-url-tab-hash="#all-permissions" aria-controls="permissions" role="tab" data-toggle="tab">
                            {{ trans('labels.backend.access.permissions.tabs.permissions') }}
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="groups" style="padding-top:20px">

                        <div class="row">
                            <div class="col-lg-6">

                                <div class="alert alert-info">
                                    <i class="fa fa-info-circle"></i> {{ trans('strings.backend.access.permissions.sort_explanation') }}
                                </div><!--alert info-->

                                <div class="dd permission-hierarchy">
                                    <ol class="dd-list">
                                        @foreach ($groups as $group)
                                                <li class="dd-item" data-id="{!! $group->id !!}">
                                                    <div class="dd-handle">{!! $group->name !!} <span class="pull-right">{!! $group->permissions->count() !!} {{ trans('labels.backend.access.permissions.label') }}</span></div>

                                                    @if ($group->children->count())
                                                        <ol class="dd-list">
                                                            @foreach($group->children as $child)
                                                                <li class="dd-item" data-id="{!! $child->id !!}">
                                                                    <div class="dd-handle">{!! $child->name !!} <span class="pull-right">{!! $child->permissions->count() !!} {{ trans('labels.backend.access.permissions.label') }}</span></div>
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
                                    <i class="fa fa-info-circle"></i> {{ trans('strings.backend.access.permissions.edit_explanation') }}
                                </div><!--alert info-->

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>{{ trans('labels.backend.access.permissions.groups.table.name') }}</th>
                                            <th>{{ trans('labels.general.actions') }}</th>
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
                                </div>
                            </div><!--col-lg-8-->
                        </div><!--row-->

                    </div><!--groups-->

                    <div role="tabpanel" class="tab-pane" id="permissions" style="padding-top:20px">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>{{ trans('labels.backend.access.permissions.table.permission') }}</th>
                                    <th>{{ trans('labels.backend.access.permissions.table.name') }}</th>
                                    <th>{{ trans('labels.backend.access.permissions.table.dependencies') }}</th>
                                    <th>{{ trans('labels.backend.access.permissions.table.users') }}</th>
                                    <th>{{ trans('labels.backend.access.permissions.table.roles') }}</th>
                                    <th>{{ trans('labels.backend.access.permissions.table.group') }}</th>
                                    <th>{{ trans('labels.backend.access.permissions.table.group-sort') }}</th>
                                    <th>{{ trans('labels.backend.access.permissions.table.system') }}</th>
                                    <th>{{ trans('labels.general.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{!! $permission->name !!}</td>
                                        <td>{!! $permission->display_name !!}</td>
                                        <td>
                                            @if (count($permission->dependencies))
                                                @foreach($permission->dependencies as $dependency)
                                                    {!! $dependency->permission->display_name !!}<br/>
                                                @endforeach
                                            @else
                                                <span class="label label-success">{{ trans('labels.general.none') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (count($permission->users))
                                                @foreach($permission->users as $user)
                                                    {!! $user->name !!}<br/>
                                                @endforeach
                                            @else
                                                <span class="label label-danger">{{ trans('labels.general.none') }}</span>
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
                                                <span class="label label-danger">{{ trans('labels.general.none') }}</span>
                                            @endif
                                        </td>
                                        <td>{!! $permission->sort !!}</td>
                                        <td>{!! $permission->system_label !!}</td>
                                        <td>{!! $permission->action_buttons !!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="pull-left">
                            {{ $permissions->total() }} {{ trans_choice('labels.backend.access.permissions.table.total', $permissions->total()) }}
                        </div>

                        <div class="pull-right">
                            {{ $permissions->render() }}
                        </div>

                        <div class="clearfix"></div>

                    </div><!--permissions-->
                </div>
            </div><!--permission tabs-->
        </div><!-- /.box-body -->
    </div><!--box-->
@stop

@section('after-scripts-end')
    {!! Html::script('js/backend/plugin/nestable/jquery.nestable.js') !!}

    <script>
        // if hash is present, show targetted tab
        function showTabIfHashIsPresent (hash) {
            if(window.location.hash && window.location.hash == hash) {
                console.log('show tab: ' +hash);
                $('a[data-url-tab-hash='+hash+']').tab('show');
            }
        }

        // Needed for when currently on the same page and trying
        // to go to #all-permissions through dropdown link.
        $(window).bind('hashchange', function() {
            showTabIfHashIsPresent('#all-permissions');
        });

        // update url after changing tab.
        // This is to get complete consistency and
        // keep the url updated correctly.
        $('.nav-tabs a').on('shown.bs.tab', function (e) {
            if(e.target.hash === '#permissions'){
                window.location.hash = '#all-permissions';
            }
            else{
                history.pushState("", document.title, window.location.pathname+ window.location.search);
            }
        });

        $(function() {

            // check if hash is present in url
            // then show specified tab
            showTabIfHashIsPresent('#all-permissions');

            var hierarchy = $('.permission-hierarchy');
            hierarchy.nestable({maxDepth:2});

            hierarchy.on('change', function() {
                @permission('sort-permission-groups')
                    $.ajax({
                        url : "{!! route('admin.access.roles.groups.update-sort') !!}",
                        type: "post",
                        data : {data:hierarchy.nestable('serialize')},
                        success: function(data) {
                            if (data.status == "OK")
                                toastr.success("{!! trans('strings.backend.access.permissions.groups.hierarchy_saved') !!}");
                            else
                                toastr.error("{!! trans('auth.unknown') !!}.");
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            toastr.error("{!! trans('auth.unknown') !!}: " + errorThrown);
                        }
                    });
                @else
                    toastr.error("{!! trans('auth.general_error') !!}");
                @endauth
            });
        });
    </script>
@stop
