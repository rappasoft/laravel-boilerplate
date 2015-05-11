@extends('frontend.layouts.master')

@section('content')
	<div class="row">

		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
				<div class="panel-heading">Update Information</div>

				<div class="panel-body">

                       {!! Form::model($user, ['route' => ['profile.update', $user->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) !!}

                              <div class="form-group">
                                    <label class="col-md-4 control-label">Name</label>
                                    <div class="col-md-6">
                                        {!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
                                    </div>
                              </div>

                              @if ($user->canChangeEmail())
                                  <div class="form-group">
                                      <label class="col-md-4 control-label">E-mail Address</label>
                                      <div class="col-md-6">
                                          {!! Form::input('email', 'email', null, ['class' => 'form-control']) !!}
                                      </div>
                                  </div>
                              @endif

                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-4">
                                      {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                  </div>
                              </div>

                       {!! Form::close() !!}

				</div><!--panel body-->

			</div><!-- panel -->

		</div><!-- col-md-10 -->

	</div><!-- row -->
@endsection