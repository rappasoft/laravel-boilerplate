{{ Form::open(['route' => ['frontend.auth.password.change'], 'class' => 'form-horizontal', 'method' => 'patch']) }}

    <div class="form-group">
        {{ Form::label('old_password', __('Old Password'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::input('password', 'old_password', null, ['class' => 'form-control', 'placeholder' => __('Old Password')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('password', __('New Password'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => __('New Password')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('password_confirmation', __('New Password Confirmation'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder' => __('New Password Confirmation')]) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {{ Form::submit(__('Update'), ['class' => 'btn btn-primary', 'id' => 'change-password']) }}
        </div>
    </div>

{{ Form::close() }}