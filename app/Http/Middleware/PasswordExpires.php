<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

/**
 * Class PasswordExpired.
 */
class PasswordExpires
{
    /**
     * @param         $request
     * @param Closure $next
     *
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if (is_numeric(config('access.users.password_expires_days')) && $user->canChangePassword()) {
            $password_changed_at = new Carbon($user->password_changed_at ?: $user->created_at);

            if (now()->diffInDays($password_changed_at) >= config('access.users.password_expires_days')) {
                return redirect()->route('frontend.auth.password.expired');
            }
        }

        return $next($request);
    }
}
