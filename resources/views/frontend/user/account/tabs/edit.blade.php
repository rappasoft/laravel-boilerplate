{{ Form::model($logged_in_user, ['route' => 'frontend.user.profile.update', 'class' => 'form-horizontal', 'method' => 'PATCH']) }}

    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ Form::label('first_name', __('validation.attributes.frontend.first_name')) }}
                {{ Form::text('first_name', null,
                ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => __('validation.attributes.frontend.first_name')]) }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ Form::label('last_name', __('validation.attributes.frontend.last_name')) }}
                {{ Form::text('last_name', null,
                ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => __('validation.attributes.frontend.last_name')]) }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    @if ($logged_in_user->canChangeEmail())
        <div class="row">
            <div class="col">
                <div class="alert alert-info">
                    <i class="fa fa-info-circle"></i> {{  __('strings.frontend.user.change_email_notice') }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', __('validation.attributes.frontend.email')) }}
                    {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'maxlength' => '191', 'placeholder' => __('validation.attributes.frontend.email')]) }}
                </div><!--form-group-->
            </div><!--col-->
        </div><!--row-->
    @endif

    <div class="row">
        <div class="col">
            <div class="form-group">
                <button type="submit" name="button" class="btn btn-primary" id='update-profile'>
                    <i class='fa fa-save'></i> {{ __('labels.general.buttons.update') }}
                </button>
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

{{ Form::close() }}
