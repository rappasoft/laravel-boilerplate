{{ Form::open(['route' => ['frontend.auth.password.update'], 'class' => 'form-horizontal', 'method' => 'patch']) }}

<div class="row">
    <div class="col">
        <div class="form-group">
            {{ Form::label('old_password', __('validation.attributes.frontend.old_password')) }}
            {{ Form::password('old_password', ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => __('validation.attributes.frontend.old_password')]) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            {{ Form::label('password', __('validation.attributes.frontend.password')) }}
            {{ Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('validation.attributes.frontend.password')]) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            {{ Form::label('password_confirmation', __('validation.attributes.frontend.password_confirmation')) }}
            {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('validation.attributes.frontend.password_confirmation')]) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            <button type="submit" name="button" class="btn btn-primary" id='change-password'>
                <i class='fa fa-save'></i> {{ __('labels.general.buttons.update') }}
            </button>
        </div>
    </div>
</div>
{{ Form::close() }}
