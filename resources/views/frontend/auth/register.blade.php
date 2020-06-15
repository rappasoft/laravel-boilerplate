@extends('frontend.layouts.app')

@section('title', __('Register'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-frontend.card>
                <x-slot name="header">
                    @lang('Register')
                </x-slot>

                <x-slot name="body">
                    <x-forms.post :action="route('frontend.auth.register')">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">@lang('Name')</label>

                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="{{ __('Name') }}" required autofocus autocomplete="name" />
                            </div>
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">@lang('E-mail Address')</label>

                            <div class="col-md-6">
                                <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" required autocomplete="email" />
                            </div>
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">@lang('Password')</label>

                            <div class="col-md-6">
                                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" required autocomplete="new-password" />
                            </div>
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">@lang('Password Confirmation')</label>

                            <div class="col-md-6">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Password Confirmation') }}" required autocomplete="new-password" />
                            </div>
                        </div><!--form-group-->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary" type="submit">@lang('Register')</button>
                            </div>
                        </div><!--form-group-->
                    </x-forms.post>
                </x-slot>
            </x-frontend.card>
        </div><!--col-md-8-->
    </div><!--row-->
@endsection
