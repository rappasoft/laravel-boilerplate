{{ Form::model(auth()->user(), ['route' => 'frontend.user.profile.update', 'class' => 'form-horizontal', 'method' => 'PATCH']) }}

<div class="form-group">
    {{ Form::label('first_name', __('validation.attributes.frontend.first_name'),
    ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-12">
        {{ Form::text('first_name', null,
        ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'maxlength' => '191', 'placeholder' => __('validation.attributes.frontend.first_name')]) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('last_name', __('validation.attributes.frontend.last_name'),
    ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-12">
        {{ Form::text('last_name', null, ['class' => 'form-control', 'required' => 'required', 'maxlength' => '191', 'placeholder' => __('validation.attributes.frontend.last_name')]) }}
    </div>
</div>

@if (auth()->user()->canChangeEmail())
    <div class="form-group">
        {{ Form::label('email', __('validation.attributes.frontend.email'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-12">
            <div class="alert alert-info">
                <i class="fa fa-info-circle"></i> {{  __('strings.frontend.user.change_email_notice') }}
            </div>

            {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'maxlength' => '191', 'placeholder' => __('validation.attributes.frontend.email')]) }}
        </div>
    </div>
@endif

<div class="form-group">
    <div class="col-md-12">
        {{ Form::submit(__('labels.general.buttons.update'), ['class' => 'btn btn-primary', 'id' => 'update-profile']) }}
    </div>
</div>

{{ Form::close() }}