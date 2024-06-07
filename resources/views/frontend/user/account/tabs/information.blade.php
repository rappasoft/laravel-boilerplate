<x-forms.patch :action="route('frontend.user.profile.update')" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="name" class="col-md-3 col-form-label text-md-right">@lang('Name')</label>

        <div class="col-md-9">
            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}"
                   value="{{ old('name') ?? $logged_in_user->name }}" required autofocus autocomplete="name"/>
        </div>
    </div><!--form-group-->

    @if ($logged_in_user->canChangeEmail())
        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label text-md-right">@lang('E-mail Address')</label>

            <div class="col-md-9">
                <x-utils.alert type="info" class="mb-3" :dismissable="false">
                    <i class="fas fa-info-circle"></i> @lang('If you change your e-mail you will be logged out until you confirm your new e-mail address.')
                </x-utils.alert>

                <input type="email" name="email" id="email" class="form-control"
                       placeholder="{{ __('E-mail Address') }}" value="{{ old('email') ?? $logged_in_user->email }}"
                       required autocomplete="email"/>
            </div>
        </div><!--form-group-->
    @endif

    <div class="form-group row">
        <label for="profile_picture" class="col-md-3 col-form-label text-md-right">@lang('Profile Image')</label>

        <div class="col-md-9">
            <label for="profile_image">Profile Image</label>
            <input type="file" name="profile_image" accept="image/*" class="form-control" id="profile_image"/>
            <img src="{{ asset($logged_in_user->profile_image) }}" height="200px" width="200px" alt="No Image Uploaded"
                 class="mt-2">
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-12 text-right">
            <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update')</button>
        </div>
    </div><!--form-group-->
</x-forms.patch>
