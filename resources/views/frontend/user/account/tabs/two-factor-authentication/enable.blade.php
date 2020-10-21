@extends('frontend.layouts.app')

@section('title', __('Enable Two Factor Authentication'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Enable Two Factor Authentication')
                    </x-slot>

                    <x-slot name="body">
                        <div class="row">
                            <div class="col-xl-4">
                                <h5><strong>@lang('Step 1: Configure your 2FA app')</strong></h5>

                                <p>@lang('To enable 2FA, you\'ll need a 2FA authenticator app on your phone. Examples include: Google Authenticator, FreeOTP, Authy, andOTP, and Microsoft Authenticator (Just to name a few).')</p>

                                <p>@lang('Most applications will let you set up by scanning the QR code from within the app. If you prefer, you may type the key below the QR code in manually.')</p>
                            </div><!--col-->

                            <div class="col-xl-8">
                                <div class="text-center">
                                    {!! $qrCode !!}

                                    <p><i class="fa fa-key"> {{ $secret }}</i></p>
                                </div>
                            </div><!--col-->
                        </div><!--row-->

                        <hr/>

                        <h5><strong>@lang('Step 2: Enter a 2FA code')</strong></h5>

                        <p>@lang('Generate a code from your 2FA app and enter it below:')</p>

                        <livewire:frontend.two-factor-authentication />
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-8-->
        </div><!--row-->
    </div><!--container-->
@endsection
