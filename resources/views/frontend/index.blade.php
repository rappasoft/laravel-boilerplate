@extends('frontend.layouts.app')

@section('content')
    <div class="row">

        <example></example>

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-home"></i> {{ __('Home') }}
                </div>

                <div class="panel-body">
                    {{ __('Welcome to :place', ['place' => app_name()]) }}
                        {!! __('Your account is not confirmed. Please click the confirmation link in your e-mail, or <a href="'.route('frontend.auth.account.confirm.resend', ':user_id').'">click here</a> to resend the confirmation e-mail.') !!}
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

        @role('Administrator')
            {{-- You can also send through the Role ID --}}

            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ __('Role Based - ') . __('Using Blade Extensions') }}</div>

                    <div class="panel-body">
                        {{ __('Test') . ' 1: ' . __('You can see this because you have the role of \':role\'!', ['role' => __('Administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endauth

        @if (access()->hasRole('Administrator'))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ __('Role Based - ') . __('Using Access Helper with Role Name') }}</div>

                    <div class="panel-body">
                        {{ __('Test') . ' 2: ' . __('You can see this because you have the role of \':role\'!', ['role' => __('Administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasRole(1))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ __('Role Based - ') . __('Using Access Helper with Role ID') }}</div>

                    <div class="panel-body">
                        {{ __('Test') . ' 3: ' . __('You can see this because you have the role of \':role\'!', ['role' => __('Administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasRoles(['Administrator', 1]))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ __('Role Based - ') . __('Using Access Helper with Array of Role Names or ID\'s where the user does not have to possess all.') }}</div>

                    <div class="panel-body">
                        {{ __('Test') . ' 4: ' . __('You can see this because you have the role of \':role\'!', ['role' => __('Administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        {{-- The second parameter says the user must have all the roles specified. Administrator does not have the role with an id of 2, so this will not show. --}}
        @if (access()->hasRoles(['Administrator', 2], true))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ __('Role Based - ') . __('Using Access Helper with Array of Role Names or ID\'s where the user does have to possess all.') }}</div>

                    <div class="panel-body">
                        {{ __('You can see this because you have the role of \':role\'!', ['role' => __('Administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @permission('view-backend')
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ __('Permission Based - ') . __('Using Access Helper with Permission Name') }}</div>

                    <div class="panel-body">
                        {{ __('Test') . ' 5: ' . __('You can see this because you have the permission of \':permission\'!', ['permission' => 'view-backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endauth

        @if (access()->hasPermission(1))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ __('Permission Based - ') . __('Using Access Helper with Permission ID') }}</div>

                    <div class="panel-body">
                        {{ __('Test') . ' 6: ' . __('You can see this because you have the permission of \':permission\'!', ['permission' => 'view_backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasPermissions(['view-backend', 1]))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ __('Permission Based - ') . __('Using Access Helper with Array of Permission Names or ID\'s where the user does not have to possess all.') }}</div>

                    <div class="panel-body">
                        {{ __('Test') . ' 7: ' . __('You can see this because you have the permission of \':permission\'!', ['permission' => 'view_backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasPermissions(['view-backend', 2], true))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ __('Permission Based - ') . __('Using Access Helper with Array of Permission Names or ID\'s where the user does have to possess all.') }}</div>

                    <div class="panel-body">
                        {{ __('You can see this because you have the permission of \':permission\'!', ['permission' => 'view_backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-home"></i> Bootstrap Glyphicon {{ __('Test') }}</div>

                <div class="panel-body">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon glyphicon-euro" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon glyphicon-cloud" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon glyphicon-envelope" aria-hidden="true"></span>
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-home"></i> Font Awesome {{ __('Test') }}</div>

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
