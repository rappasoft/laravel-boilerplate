<x-forms.patch :action="route('frontend.auth.password.change')">
    <div class="form-group row">
        <label for="current_password" class="col-md-3 col-form-label text-md-right">{{ __('Current Password') }}</label>

        <div class="col-md-9">
            <input type="password" name="current_password" class="form-control" placeholder="{{ __('Current Password') }}" required autofocus />
        </div>
    </div><!--form-group-->

    <div class="form-group row">
        <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('New Password') }}</label>

        <div class="col-md-9">
            <input type="password" name="password" class="form-control" placeholder="{{ __('New Password') }}" required />
        </div>
    </div><!--form-group-->

    <div class="form-group row">
        <label for="password_confirmation" class="col-md-3 col-form-label text-md-right">{{ __('New Password Confirmation') }}</label>

        <div class="col-md-9">
            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('New Password Confirmation') }}" required />
        </div>
    </div><!--form-group-->

    <div class="form-group row mb-0">
        <div class="col-md-12 text-right">
            <button class="btn btn-sm btn-primary float-right" type="submit">{{ __('Update Password') }}</button>
        </div>
    </div><!--form-group-->
</x-forms.patch>
