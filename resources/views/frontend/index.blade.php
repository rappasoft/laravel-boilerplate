@extends('layouts.master')

@section('content')
	<div class="row">

		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					Welcome to {{app_name()}}
				</div>
			</div><!-- panel -->

		</div><!-- col-md-10 -->

	</div><!-- row -->
@endsection