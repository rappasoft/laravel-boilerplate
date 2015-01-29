@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<div class="panel panel-default">

				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">

					@include('includes.partials.errors')

					{!! Form::open(['to' => 'password/reset', 'class' => 'form-horizontal', 'role' => 'form']) !!}

						<input type="hidden" name="token" value="{{ $token }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								{!! Form::input('email', 'email', old('email'), ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								{!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								{!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::submit('Reset Password', ['class' => 'btn btn-primary']) !!}
							</div>
						</div>

					{!! Form::close() !!}

				</div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

    </div><!-- row -->
@endsection