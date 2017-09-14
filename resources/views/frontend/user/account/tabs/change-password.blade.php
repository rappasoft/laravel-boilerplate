{{ Form::open(['route' => ['frontend.auth.password.update'], 'class' => 'form-horizontal', 'method' => 'patch']) }}

<div class="form-group">
    {{ Form::label('old_password', __('validation.attributes.frontend.old_password'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-12">
        {{ Form::password('old_password', ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => __('validation.attributes.frontend.old_password')]) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('password', __('validation.attributes.frontend.new_password'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-12">
        {{ Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('validation.attributes.frontend.new_password')]) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('password_confirmation', __('validation.attributes.frontend.new_password_confirmation'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-12">
        {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('validation.attributes.frontend.new_password_confirmation')]) }}
    </div>
</div>

<div class="form-group">
    <div class="col-md-12">
        {{ Form::submit(__('labels.general.buttons.update'), ['class' => 'btn btn-primary', 'id' => 'change-password']) }}
    </div>
</div>

{{ Form::close() }}