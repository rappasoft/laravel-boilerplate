<x-forms.patch :action="route('frontend.auth.password.change')">
    <div class="mb-3 row">
        <label for="current_password" class="col-md-3 col-form-label text-md-end">@lang('Current Password')</label>

        <div class="col-md-9">
            <input type="password" name="current_password" class="form-control"
                   placeholder="{{ __('Current Password') }}" maxlength="100" required autofocus/>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="password" class="col-md-3 col-form-label text-md-end">@lang('New Password')</label>

        <div class="col-md-9">
            <input type="password" name="password" class="form-control" placeholder="{{ __('New Password') }}"
                   maxlength="100" required/>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="password_confirmation"
               class="col-md-3 col-form-label text-md-end">@lang('New Password Confirmation')</label>

        <div class="col-md-9">
            <input type="password" name="password_confirmation" class="form-control"
                   placeholder="{{ __('New Password Confirmation') }}" maxlength="100" required/>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-md-12 text-end">
            <button class="btn btn-sm btn-primary float-end" type="submit">@lang('Update Password')</button>
        </div>
    </div>
</x-forms.patch>
