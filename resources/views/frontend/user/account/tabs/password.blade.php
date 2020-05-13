<x-forms.patch :action="route('frontend.auth.password.change')">
    <x-forms.group for="current_password" :label="__('Current Password')" labelClass="col-md-3 col-form-label text-md-right" bodyClass="col-md-9">
        <x-forms.password name="current_password" placeholder="Current Password" required autofocus />
    </x-forms.group>

    <x-forms.group for="password" :label="__('New Password')" labelClass="col-md-3 col-form-label text-md-right" bodyClass="col-md-9">
        <x-forms.password name="password" placeholder="New Password" required />
    </x-forms.group>

    <x-forms.group for="password_confirmation" :label="__('New Password Confirmation')" labelClass="col-md-3 col-form-label text-md-right" bodyClass="col-md-9">
        <x-forms.password name="password_confirmation" placeholder="New Password Confirmation" required />
    </x-forms.group>

    <x-forms.group :noLabel="true" groupClass="form-group row mb-0" bodyClass="col-md-12 text-right">
        <x-forms.submit :text="__('Update Password')" />
    </x-forms.group>
</x-forms.patch>
