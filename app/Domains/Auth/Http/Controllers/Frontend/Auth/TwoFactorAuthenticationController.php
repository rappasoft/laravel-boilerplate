<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;

/**
 * Class TwoFactorAuthenticationController.
 */
class TwoFactorAuthenticationController
{
    /**
     * @param  Request  $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $secret = $request->user()->createTwoFactorAuth();

        return view('frontend.user.account.tabs.two-factor-authentication.enable')
            ->withQrCode($secret->toQr())
            ->withSecret($secret->toString());
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function show(Request $request)
    {
        return view('frontend.user.account.tabs.two-factor-authentication.recovery')
            ->withRecoveryCodes($request->user()->getRecoveryCodes());
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function update(Request $request)
    {
        $request->user()->generateRecoveryCodes();

        session()->flash('flash_warning', __('Any old backup codes have been invalidated.'));

        return redirect()->route('frontend.auth.account.2fa.show')->withFlashSuccess(__('Two Factor Recovery Codes Regenerated'));
    }
}
