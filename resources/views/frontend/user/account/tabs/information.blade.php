<x-forms.patch :action="route('frontend.user.profile.update')" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="name" class="col-md-3 col-form-label text-md-right">@lang('Name')</label>

        <div class="col-md-9">
            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $logged_in_user->name }}" required autofocus autocomplete="name" />
        </div>
    </div><!--form-group-->

    @if ($logged_in_user->canChangeEmail())
        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label text-md-right">@lang('E-mail Address')</label>

            <div class="col-md-9">
                <x-utils.alert type="info" class="mb-3" :dismissable="false">
                    <i class="fas fa-info-circle"></i> @lang('If you change your e-mail you will be logged out until you confirm your new e-mail address.')
                </x-utils.alert>

                <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') ?? $logged_in_user->email }}" required autocomplete="email" />
            </div>
        </div><!--form-group-->
    @endif

    <div class="form-group row">
        <label for="profile_picture" class="col-md-3 col-form-label text-md-right">@lang('Profile Picture')</label>

        <div class="col-md-9">
            <input type="file" name="profile_picture" id="profile_picture" class="form-control @error('profile_picture') is-invalid @enderror" accept="image/*" onchange="previewProfilePicture(event)">

            @error('profile_picture')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            @if ($logged_in_user->profile_picture)
                <img id="profile_picture_preview" style="height: 200px" src="{{ asset('profile_pictures/' . $logged_in_user->profile_picture) }}" class="mt-2 user-profile-image" alt="{{ $logged_in_user->name }}" style="max-width: 150px;">
            @else
                <img id="profile_picture_preview" src="{{ $logged_in_user->avatar }}" class="mt-2 user-profile-image" alt="{{ $logged_in_user->name }}" style="max-width: 150px;">
            @endif
        </div>
    </div><!--form-group-->

    <div class="form-group row mb-0">
        <div class="col-md-12 text-right">
            <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update')</button>
        </div>
    </div><!--form-group-->
</x-forms.patch>

<script>
function previewProfilePicture(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('profile_picture_preview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
