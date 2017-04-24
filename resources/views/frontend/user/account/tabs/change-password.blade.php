{{ Form::open(['route' => ['frontend.auth.password.change'], 'class' => 'form-horizontal', 'method' => 'patch']) }}

    <div class="form-group">
        {{ Form::label('old_password', trans('validation.attributes.frontend.old_password'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::password('old_password', ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.frontend.old_password')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('password', trans('validation.attributes.frontend.new_password'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.new_password')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('password_confirmation', trans('validation.attributes.frontend.new_password_confirmation'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.new_password_confirmation')]) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {{ Form::submit(trans('labels.general.buttons.update'), ['class' => 'btn btn-primary', 'id' => 'change-password']) }}
        </div>
    </div>

{{ Form::close() }}