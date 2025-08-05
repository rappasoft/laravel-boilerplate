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
                        {{-- Show new codes if just generated --}}
                        @if(session('new_recovery_codes'))
                            <div class="alert alert-warning">
                                <h5><strong>@lang('Save your two factor recovery codes:')</strong></h5>
                                <p>@lang('Recovery codes are used to access your account in the event you no longer have access to your authenticator app.')</p>

                                <div class="recovery-codes-list bg-light p-3 rounded">
                                    @foreach(session('new_recovery_codes') as $code)
                                        <div class="recovery-code">
                                            <code>{{ $code }}</code>
                                        </div>
                                    @endforeach
                                </div>

                                <p class="mt-3"><strong>@lang('Each code can only be used once!')</strong></p>

                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" id="codes-saved">
                                    <label class="form-check-label" for="codes-saved">
                                        @lang('I have stored these codes in a safe place')
                                    </label>
                                </div>
                            </div>
                        @endif

                        {{-- Recovery codes status --}}
                        <div class="mb-4">
                            <h5>@lang('Recovery Codes Status')</h5>
                            <p>@lang('You have :count unused recovery codes remaining.', ['count' => $unusedCount])</p>

                            @if($unusedCount <= 2)
                                <div class="alert alert-warning">
                                    @lang('You are running low on recovery codes. Consider generating new ones.')
                                </div>
                            @endif
                        </div>

                        {{-- Generate new codes button --}}
                        <x-forms.patch :action="route('frontend.auth.account.2fa.update')">
                            <button class="btn btn-warning" type="submit"
                                    onclick="return confirm('@lang('This will invalidate all existing recovery codes. Continue?')')">
                                @lang('Generate New Backup Codes')
                            </button>
                        </x-forms.patch>

                        {{-- Back to account button --}}
                        <a href="{{ route('frontend.user.account') }}#two-factor-authentication"
                           class="btn btn-secondary ml-2">
                            @lang('Back to Account')
                        </a>
                    </x-slot>
                </x-frontend.card>
            </div>
        </div>
    </div>

    <style>
        .recovery-codes-list {
            font-family: 'Courier New', monospace;
            max-height: 200px;
            overflow-y: auto;
        }

        .recovery-code {
            padding: 5px 0;
            border-bottom: 1px solid #dee2e6;
        }

        .recovery-code:last-child {
            border-bottom: none;
        }

        .recovery-code code {
            font-size: 1.1em;
            background: transparent;
            padding: 0;
        }
    </style>
@endsection
