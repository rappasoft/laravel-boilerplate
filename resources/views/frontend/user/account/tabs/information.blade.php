<x-forms.patch :action="route('frontend.user.profile.update')">
    <x-forms.group for="name" :label="__('Name')" labelClass="col-md-3 col-form-label text-md-right" bodyClass="col-md-9">
        <x-forms.text name="name" :placeholder="__('Name')" :value="old('name') ?? $logged_in_user->name" required autocomplete="name" autofocus />
    </x-forms.group>

    @if ($logged_in_user->canChangeEmail())
        <x-forms.group for="email" :label="__('E-mail Address')" labelClass="col-md-3 col-form-label text-md-right" bodyClass="col-md-9">
            <x-utils.alert type="info" class="mb-3" :dismissable="false">
                <i class="fas fa-info-circle"></i> @lang('If you change your e-mail you will be logged out until you confirm your new e-mail address.')
            </x-utils.alert>

            <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') ?? $logged_in_user->email }}" required autocomplete="email" />
        </x-forms.group>
    @endif

    <x-forms.group :noLabel="true" groupClass="form-group row mb-0" bodyClass="col-md-12 text-right">
        <x-forms.submit :text="__('Update')" />
    </x-forms.group>
</x-forms.patch>
