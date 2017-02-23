{{ Form::model($logged_in_user, ['route' => 'frontend.user.profile.update', 'class' => 'form-horizontal', 'method' => 'PATCH']) }}

    <div class="form-group">
        {{ Form::label('name', __('Name'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => __('Name')]) }}
        </div>
    </div>

    @if ($logged_in_user->canChangeEmail())
        <div class="form-group">
            {{ Form::label('email', __('E-mail Address'), ['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => __('E-mail Address')]) }}
            </div>
        </div>
    @endif

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {{ Form::submit(__('Update'), ['class' => 'btn btn-primary', 'id' => 'update-profile']) }}
        </div>
    </div>

{{ Form::close() }}