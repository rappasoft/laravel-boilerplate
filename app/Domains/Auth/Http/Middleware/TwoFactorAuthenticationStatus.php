<?php

namespace App\Domains\Auth\Http\Middleware;

use Closure;

/**
 * Class TwoFactorAuthenticationStatus.
 */
class TwoFactorAuthenticationStatus
{
    /**
     * @param $request
     * @param  Closure  $next
     * @param  string  $status
     * @return mixed
     */
    public function handle($request, Closure $next, $status = 'enabled')
    {
        if (! in_array($status, ['enabled', 'disabled'])) {
            abort(404);
        }

        // If the backend does not require 2FA than continue
        if ($status === 'enabled' && $request->is('admin*') && ! config('boilerplate.access.user.admin_requires_2fa')) {
            return $next($request);
        }

        // Check if user has Google2FA enabled (has google2fa_secret)
        $userHas2FA = !empty($request->user()->google2fa_secret);

        // Page requires 2fa, but user is not enabled or page does not require 2fa, but it is enabled
        if (
            ($status === 'enabled' && ! $userHas2FA) ||
            ($status === 'disabled' && $userHas2FA)
        ) {
            return redirect()->route('frontend.auth.account.2fa.create')
                ->withFlashDanger(__('Two-factor Authentication must be :status to view this page.', ['status' => $status]));
        }

        return $next($request);
    }
}
