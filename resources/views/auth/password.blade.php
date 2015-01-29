@extends('layouts.master')

@section('content')
	<div class="row">

		<div class="col-md-8 col-md-offset-2">

			<div class="panel panel-default">

				<div class="panel-heading">Reset Password</div>

				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					@include('includes.partials.errors')

					{!! Form::open(['to' => 'password/email', 'class' => 'form-horizontal', 'role' => 'form']) !!}

						<div class="form-group">
							<label class="col-md-4 control-label">E-mail Address</label>
							<div class="col-md-6">
								{!! Form::input('email', 'email', old('email'), ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::submit('Send Password Reset Link', ['class' => 'btn btn-primary']) !!}
							</div>
						</div>

					{!! Form::close() !!}

				</div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

    </div><!-- row -->
@endsection