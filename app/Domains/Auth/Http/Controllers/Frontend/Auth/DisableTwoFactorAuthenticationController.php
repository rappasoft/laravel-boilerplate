<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Domains\Auth\Http\Requests\Frontend\Auth\DisableTwoFactorAuthenticationRequest;
use PragmaRX\Google2FALaravel\Support\Authenticator;

/**
 * Class DisableTwoFactorAuthenticationController.
 */
class DisableTwoFactorAuthenticationController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('frontend.user.account.tabs.two-factor-authentication.disable');
    }

    /**
     * @param  DisableTwoFactorAuthenticationRequest  $request
     * @return mixed
     */
    public function destroy(DisableTwoFactorAuthenticationRequest $request)
    {
        $user = $request->user();
        $google2fa = app('pragmarx.google2fa');

        $valid = $google2fa->verifyKey($user->google2fa_secret, $request->code);

        if (!$valid) {
            return back()->withErrors(['code' => 'Invalid 2FA code']);
        }

        $user->disableTwoFactorAuth();

        return redirect()->route('frontend.user.account', ['#two-factor-authentication'])
            ->withFlashSuccess(__('Two Factor Authentication Successfully Disabled'));
    }
}
