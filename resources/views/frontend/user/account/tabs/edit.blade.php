<form action="{{ route('frontend.user.profile.update') }}" method="post" class="form-horizontal">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="first_name">{{ __('validation.attributes.frontend.first_name') }}</label>
                <input type="text" name="first_name" id="first_name" class="form-control" maxlength="191" placeholder="{{ __('validation.attributes.frontend.first_name') }}" value="{{ $logged_in_user->first_name }}" required="required" autofocus="autofocus" />
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="last_name">{{ __('validation.attributes.frontend.last_name') }}</label>
                <input type="text" name="last_name" id="last_name" class="form-control" maxlength="191" placeholder="{{ __('validation.attributes.frontend.last_name') }}" value="{{ $logged_in_user->last_name }}" required="required" />
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
                    <label for="email">{{ __('validation.attributes.frontend.email') }}</label>
                    <input type="email" name="email" id="email" class="form-control" maxlength="191" placeholder="{{ __('validation.attributes.frontend.email') }}" value="{{ $logged_in_user->email }}" required="required" />
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
</form>
