@extends('frontend.layouts.master')

@section('content')
	<div class="row">

		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
				<div class="panel-heading"><i class="fa fa-home"></i> Home</div>

				<div class="panel-body">
					Welcome to {{app_name()}}
				</div>
			</div><!-- panel -->

		</div><!-- col-md-10 -->

		@role('Administrator')
		    <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> Role Based - Using Blade Extensions</div>

                    <div class="panel-body">
                        Test 1: You can see this because you have the role of 'Administrator'!
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
		@endrole

		@if (access()->hasRole('Administrator'))
		    <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> Role Based - Using Access Helper with Role Name</div>

                    <div class="panel-body">
                        Test 2: You can see this because you have the role of 'Administrator'!
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
		@endif

		@if (access()->hasRole(1))
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> Role Based - Using Access Helper with Role ID</div>

                    <div class="panel-body">
                        Test 3: You can see this because you have the role of 'Administrator'!
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasRoles(['Administrator', 1]))
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> Role Based - Using Access Helper with Array of Role Names or ID's where the user does not have to possess all.</div>

                    <div class="panel-body">
                        Test 4: You can see this because you have the role of 'Administrator'!
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        {{-- The second parameter says the user must have all the roles specified. Administrator does not have the role with an id of 2, so this will not show. --}}
        @if (access()->hasRoles(['Administrator', 2], true))
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> Role Based - Using Access Helper with Array of Role Names or ID's where the user does have to possess all.</div>

                    <div class="panel-body">
                        You can see this because you have the role of 'Administrator'!
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasPermission('view_backend'))
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> Permission Based - Using Access Helper with Permission Name</div>

                    <div class="panel-body">
                        Test 5: You can see this because you have the permission of 'view_backend'!
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasPermission(1))
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> Permission Based - Using Access Helper with Permission ID</div>

                    <div class="panel-body">
                        Test 6: You can see this because you have the permission of 'view_backend'!
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasPermissions(['view_backend', 1]))
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> Permission Based - Using Access Helper with Array of Permission Names or ID's where the user does not have to possess all.</div>

                    <div class="panel-body">
                        Test 7: You can see this because you have the permission of 'view_backend'!
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        {{-- The second parameter says the user must have all the roles specified. Administrator does not have the role with an id of 2, so this will not show. --}}
        @if (access()->hasPermissions(['view_backend', 2], true))
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> Permission Based - Using Access Helper with Array of Permission Names or ID's where the user does have to possess all.</div>

                    <div class="panel-body">
                        You can see this because you have the permission of 'view_backend'!
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-home"></i> Javascript Injected from a Controller</div>

                <div class="panel-body">
                    Test 8: View console, you should see 'it works!' which is coming from FrontendController@index
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

	</div><!-- row -->
@endsection

@section('after-scripts-end')
	<script>
		//Being injected from FrontendController
		console.log(test);
	</script>
@stop