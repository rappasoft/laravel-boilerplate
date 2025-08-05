<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Http\Request;
use Livewire\Component;

/**
 * Class TwoFactorAuthentication.
 */
class TwoFactorAuthentication extends Component
{
    public $code;

    public function validateCode(Request $request)
    {
        $this->validate([
            'code' => 'required|min:6',
        ]);

        $user = $request->user();
        $google2fa = app('pragmarx.google2fa');
        $secret = session('google2fa_secret');

        if (!$secret) {
            $this->addError('code', __('Session expired. Please try again.'));
            return redirect()->route('frontend.auth.account.2fa.create');
        }

        $valid = $google2fa->verifyKey($secret, $this->code);

        if ($valid) {
            $user->enableTwoFactorAuth($secret);

            // Generate initial recovery codes
            $recoveryCodes = $user->generateRecoveryCodes();

            session()->forget('google2fa_secret');
            session()->flash('new_recovery_codes', $recoveryCodes);
            $this->resetErrorBag();

            session()->flash('flash_success', __('Two Factor Authentication Successfully Enabled'));

            return redirect()->route('frontend.auth.account.2fa.show');
        }

        $this->addError('code', __('Your authorization code was invalid. Please try again.'));

        return false;
    }

    public function render()
    {
        return view('components.frontend.two-factor-authentication');
    }
}
