<div>
    @error('code')
        <x-utils.alert type="danger">
            {{ $message }}
        </x-utils.alert>
    @enderror

    <form wire:submit.prevent="validateCode" class="form-horizontal">
        <x-forms.group labelClass="col-md-4 col-form-label text-md-right" bodyClass="col-md-6" for="code" :label="__('Authorization Code')">
            <x-forms.text wire:model.lazy="code" id="code" minlength="6" :placeholder="__('Authorization Code')" required autofocus />
        </x-forms.group>

        <x-forms.group :noLabel="true" groupClass="form-group row mb-0" bodyClass="col-md-6 offset-md-4">
            <x-forms.submit class="btn btn-primary" :text="__('Enable Two Factor Authentication')" />
        </x-forms.group>
    </form>
</div>
