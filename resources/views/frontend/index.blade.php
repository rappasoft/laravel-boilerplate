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
                    <div class="panel-heading"><i class="fa fa-home"></i> Role Based</div>

                    <div class="panel-body">
                        You can see this because you have the role of 'Administrator'!
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
		@endrole

	</div><!-- row -->
@endsection

@section('after-scripts-end')
	<script>
		//Being injected from FrontendController
		console.log(test);
	</script>
@stop