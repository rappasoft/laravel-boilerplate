<form action="{{ route('frontend.auth.password.update') }}" method="post" class="form-horizontal">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="old_password">{{ __('validation.attributes.frontend.old_password') }}</label>
                <input type="password" name="old_password" id="old_password" class="form-control" placeholder="{{ __('validation.attributes.frontend.old_password') }}" required="required" autofocus="autofocus" />
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="password">{{ __('validation.attributes.frontend.password') }}</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('validation.attributes.frontend.password') }}" required="required" />
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="password_confirmation">{{ __('validation.attributes.frontend.password_confirmation') }}</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('validation.attributes.frontend.password_confirmation') }}" required="required" />
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                <button type="submit" name="button" class="btn btn-primary" id='change-password'>
                    <i class='fa fa-save'></i> {{ __('labels.general.buttons.update') }}
                </button>
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->
</form>
