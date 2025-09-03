@extends('frontend.layouts.app')

@section('title', __('Your password has expired.'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Your password has expired.')
                    </x-slot>

                    <x-slot name="body">
                        <x-forms.patch :action="route('frontend.auth.password.expired.update')">
                            <div class="mb-3 row">
                                <label for="current_password" class="col-md-4 col-form-label text-md-end">@lang('Current Password')</label>

                                <div class="col-md-6">
                                    <input type="password" name="current_password" class="form-control" placeholder="{{ __('Current Password') }}" maxlength="100" required autofocus />
                                </div>
                            </div><!--form-group-->

                            <div class="mb-3 row">
                                <label for="password" class="col-md-4 col-form-label text-md-end">@lang('New Password')</label>

                                <div class="col-md-6">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('New Password') }}" maxlength="100" required autocomplete="password" />
                                </div>
                            </div><!--form-group-->

                            <div class="mb-3 row">
                                <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">@lang('Password Confirmation')</label>

                                <div class="col-md-6">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" maxlength="100" placeholder="{{ __('Password Confirmation') }}" required autocomplete="new-password" />
                                </div>
                            </div><!--form-group-->

                            <div class="mb-3 row">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-primary" type="submit">@lang('Update Password')</button>
                                </div>
                            </div><!--form-group-->
                        </x-forms.patch>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-8-->
        </div><!--row-->
    </div><!--container-->
@endsection
