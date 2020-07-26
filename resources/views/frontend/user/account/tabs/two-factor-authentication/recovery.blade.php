@extends('frontend.layouts.app')

@section('title', __('Two Factor Recovery Codes'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Two Factor Recovery Codes')
                    </x-slot>

                    <x-slot name="body">
                        <h5>@lang('Save your two factor recovery codes:')</h5>

                        <p>@lang('Recovery codes are used to access your account in the event you no longer have access to your authenticator app.')</p>

                        <p class="text-danger"><strong>@lang('Save these codes! If you lose your device and don\'t have the recovery codes you will lose access to your account forever!')</strong></p>

                        <x-forms.patch :action="route('frontend.auth.account.2fa.update')" name="confirm-item">
                            <button class="btn btn-sm btn-block btn-danger mb-3" type="submit">@lang('Generate New Backup Codes')</button>
                        </x-forms.patch>

                        <p><strong>@lang('Each code can only be used once!')</strong></p>

                        <div class="row">
                            @foreach (collect($recoveryCodes)->chunk(5) as $codes)
                                <div class="col-6">
                                    <ul>
                                        @foreach ($codes as $code)
                                            <li>
                                                {{ $code['code'] }} -

                                                @if ($code['used_at'])
                                                    <strong class="text-danger">
                                                        @lang('Used'): @displayDate(carbon($code['used_at']))
                                                    </strong>
                                                @else
                                                    <em>@lang('Not Used')</em>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div><!--col-->
                            @endforeach
                        </div><!--row-->

                        <a href="{{ route('frontend.user.account', ['#two-factor-authentication']) }}" class="btn btn-sm btn-block btn-success">@lang('I have stored these codes in a safe place')</a>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-8-->
        </div><!--row-->
    </div><!--container-->
@endsection
