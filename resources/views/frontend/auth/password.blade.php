@extends('frontend.layouts.master')

@section('content')
	<div class="row">

		<div class="col-md-8 col-md-offset-2">

			<div class="panel panel-default">

				<div class="panel-heading">{{ trans('labels.reset_password_box_title') }}</div>

				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					{!! Form::open(['to' => 'password/email', 'class' => 'form-horizontal', 'role' => 'form']) !!}

						<div class="form-group">
							{!! Form::label('email', trans('validation.attributes.email'), ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::input('email', 'email', old('email'), ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::submit(trans('labels.send_password_reset_link_button'), ['class' => 'btn btn-primary']) !!}
							</div>
						</div>

					{!! Form::close() !!}

				</div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

    </div><!-- row -->
@endsection