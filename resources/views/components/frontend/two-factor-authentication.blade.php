<div>
    @error('code')
    <x-utils.alert type="danger">
        {{ $message }}
    </x-utils.alert>
    @enderror

    <form wire:submit.prevent="validateCode" class="form-horizontal">
        <div class="mb-3 row">
            <label for="code" class="col-md-4 col-form-label text-md-end">@lang('Authorization Code')</label>

            <div class="col-md-6">
                <input
                    type="text"
                    id="code"
                    wire:model.lazy="code"
                    minlength="6"
                    class="form-control"
                    placeholder="{{ __('Authorization Code') }}"
                    required
                    autofocus/>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-6 offset-md-4">
                <button class="btn btn-primary" type="submit">@lang('Enable Two Factor Authentication')</button>
            </div>
        </div>
    </form>
</div>
