@extends('layouts.master')

@section('content')
	<div class="row">

		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
				<div class="panel-heading"><i class="fa fa-home"></i> Home</div>

				<div class="panel-body">
					Welcome to {{app_name()}}
				</div>
			</div><!-- panel -->

			<div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-home"></i> Macro Examples</div>

                <div class="panel-body">
                    <div class="form-group">
                        <label>State</label>
                        {!! Form::selectState('state', 'NY', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        {!! Form::selectCountry('country', 'US', ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div><!-- panel -->

		</div><!-- col-md-10 -->

	</div><!-- row -->
@endsection