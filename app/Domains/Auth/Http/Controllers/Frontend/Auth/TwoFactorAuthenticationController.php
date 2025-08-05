<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use PragmaRX\Google2FALaravel\Support\Authenticator;

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
        $user = $request->user();
        $google2fa = app('pragmarx.google2fa');

        $secret = $google2fa->generateSecretKey();

        // Store secret temporarily in session until confirmed
        session(['google2fa_secret' => $secret]);

        $qrCodeUrl = $google2fa->getQRCodeUrl(
            config('app.name'),
            $user->email,
            $secret
        );

        $qrCode = \SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate($qrCodeUrl);

        return view('frontend.user.account.tabs.two-factor-authentication.enable')
            ->withQrCode($qrCode)
            ->withSecret($secret);
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function show(Request $request)
    {
        $user = $request->user();

        // Get recovery codes metadata (without plain codes)
        $recoveryCodes = $user->getRecoveryCodes();
        $unusedCount = $user->getUnusedRecoveryCodesCount();

        return view('frontend.user.account.tabs.two-factor-authentication.recovery', [
            'recoveryCodes' => $recoveryCodes,
            'unusedCount' => $unusedCount,
            'hasUnusedCodes' => $user->hasUnusedRecoveryCodes(),
        ]);
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function update(Request $request)
    {
        $user = $request->user();

        // Generate new recovery codes
        $newCodes = $user->generateRecoveryCodes();

        session()->flash('flash_warning', __('Any old backup codes have been invalidated.'));
        session()->flash('new_recovery_codes', $newCodes);

        return redirect()->route('frontend.auth.account.2fa.show')
            ->withFlashSuccess(__('Two Factor Recovery Codes Regenerated'));
    }
}
