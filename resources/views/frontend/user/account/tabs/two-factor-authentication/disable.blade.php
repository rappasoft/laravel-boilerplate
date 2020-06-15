@extends('frontend.layouts.app')

@section('title', __('Disable Two Factor Authentication'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-frontend.card>
                <x-slot name="header">
                    @lang('Disable Two Factor Authentication')
                </x-slot>

                <x-slot name="body">
                    <p>@lang('Generate a code from your 2FA app and enter it below:')</p>

                    <x-forms.delete :action="route('frontend.auth.account.2fa.destroy')" name="confirm-item">
                        <x-forms.group labelClass="col-md-4 col-form-label text-md-right" bodyClass="col-md-6" for="code" :label="__('Authorization Code')">
                            <x-forms.text name="code" id="code" maxlength="10" :placeholder="__('Authorization Code')" required />
                        </x-forms.group>

                        <button class="btn btn-sm btn-block btn-danger" type="submit">{{ __('Remove Two Factor Authentication') }}</button>
                    </x-forms.delete>
                </x-slot>
            </x-frontend.card>
        </div><!--col-md-8-->
    </div><!--row-->
@endsection
