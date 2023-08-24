<x-forms.patch :action="route('frontend.user.profile.update')" enctype="multipart/form-data">
    
        <div class="form-group row">
            <label for="avatar" class="col-md-3 col-form-label text-md-right">@lang('Avatar')</label>

            <div class="col-md-9">
                <input type="file" name="avatar" id="avatar" class="form-control-file" accept="image/*" onchange="previewImage(event)">
                <div class="avatar-circle" style="width: 100px; height: 100px; border-radius: 50%; overflow: hidden; display: inline-block; margin-top: 20px; margin-left: 80px;">
                    <img id="avatar-preview" src="{{ asset($logged_in_user->profile_picture) }}" alt="@lang('Avatar Preview')" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
        </div><!--form-group-->

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

    <div class="form-group row mb-0">
        <div class="col-md-12 text-right">
            <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update')</button>
        </div>
    </div><!--form-group-->
</x-forms.patch>

<script>
    function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('avatar-preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = "{{ asset('img/profile.png') }}";
            preview.style.display = 'block';
        }
    }
</script>