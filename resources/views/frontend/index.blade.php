@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-home"></i> {{ trans('navs.general.home') }}
                </div>

                <div class="panel-body">
                    {{ trans('strings.frontend.welcome_to', ['place' => app_name()]) }}
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

        @role('Administrator')
            {{-- You can also send through the Role ID --}}

            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_blade_extensions') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 1: ' . trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endauth

        @if (access()->hasRole('Administrator'))
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_access_helper.role_name') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 2: ' . trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasRole(1))
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_access_helper.role_id') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 3: ' . trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasRoles(['Administrator', 1]))
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_access_helper.array_roles_not') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 4: ' . trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        {{-- The second parameter says the user must have all the roles specified. Administrator does not have the role with an id of 2, so this will not show. --}}
        @if (access()->hasRoles(['Administrator', 2], true))
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_access_helper.array_roles') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @permission('view-backend')
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.permission') . trans('strings.frontend.tests.using_access_helper.permission_name') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 5: ' . trans('strings.frontend.tests.you_can_see_because_permission', ['permission' => 'view-backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endauth

        @if (access()->hasPermission(1))
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.permission') . trans('strings.frontend.tests.using_access_helper.permission_id') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 6: ' . trans('strings.frontend.tests.you_can_see_because_permission', ['permission' => 'view_backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasPermissions(['view-backend', 1]))
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.permission') . trans('strings.frontend.tests.using_access_helper.array_permissions_not') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 7: ' . trans('strings.frontend.tests.you_can_see_because_permission', ['permission' => 'view_backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasPermissions(['view-backend', 2], true))
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.permission') . trans('strings.frontend.tests.using_access_helper.array_permissions') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.tests.you_can_see_because_permission', ['permission' => 'view_backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.js_injected_from_controller') }}</div>

                <div class="panel-body">
                    {{ trans('strings.frontend.test') . ' 8: ' . trans('strings.frontend.tests.view_console_it_works') }}
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-home"></i> Bootstrap Glyphicon {{ trans('strings.frontend.test') }}</div>

                <div class="panel-body">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon glyphicon-euro" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon glyphicon-cloud" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon glyphicon-envelope" aria-hidden="true"></span>
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-home"></i> Font Awesome {{ trans('strings.frontend.test') }}</div>

                <div class="panel-body">
                    <i class="fa fa-home"></i>
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-pinterest"></i>
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
@endsection

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
        console.log(test);
    </script>
@stop