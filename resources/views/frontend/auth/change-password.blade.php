@extends('frontend.layouts.master')

@section('content')
	<div class="row">

		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
				<div class="panel-heading">Change Password</div>

				<div class="panel-body">

                       {!! Form::open(['route' => ['password.change'], 'class' => 'form-horizontal']) !!}

                              <div class="form-group">
                                      <label class="col-md-4 control-label">Old Password</label>
                                      <div class="col-md-6">
                                          {!! Form::input('password', 'old_password', null, ['class' => 'form-control']) !!}
                                      </div>
                              </div>

                              <div class="form-group">
                                    <label class="col-md-4 control-label">New Password</label>
                                    <div class="col-md-6">
                                        {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
                                    </div>
                              </div>

                              <div class="form-group">
                                    <label class="col-md-4 control-label">Confirm New Password</label>
                                    <div class="col-md-6">
                                        {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control']) !!}
                                    </div>
                              </div>

                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-4">
                                      {!! Form::submit('Change Password', ['class' => 'btn btn-primary']) !!}
                                  </div>
                              </div>

                       {!! Form::close() !!}

				</div><!--panel body-->

			</div><!-- panel -->

		</div><!-- col-md-10 -->

	</div><!-- row -->
@endsection