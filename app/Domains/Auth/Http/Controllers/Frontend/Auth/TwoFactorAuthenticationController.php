<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class TwoFactorAuthenticationController.
 */
class TwoFactorAuthenticationController extends Controller
{

    /**
     * @param  Request  $request
     *
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
     *
     * @return mixed
     */
    public function show(Request $request)
    {
        return view('frontend.user.account.tabs.two-factor-authentication.recovery')
            ->withRecoveryCodes($request->user()->getRecoveryCodes());
    }

    /**
     * @param  Request  $request
     *
     * @return mixed
     */
    public function update(Request $request)
    {
        $request->user()->generateRecoveryCodes();

        session()->flash('flash_warning', __('Any old backup codes have been invalidated.'));

        return redirect()->route('frontend.user.account.2fa.show')->withFlashSuccess(__('Two Factor Recovery Codes Regenerated'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete()
    {
        return view('frontend.user.account.tabs.two-factor-authentication.disable');
    }

    /**
     * @param  Request  $request
     *
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function destroy(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|totp_code',
        ]);

        $request->user()->disableTwoFactorAuth();

        return redirect()->route('frontend.user.account', ['#two-factor-authentication'])->withFlashSuccess(__('Two Factor Authentication Successfully Disabled'));
    }
}
