<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RecoveryCodeAuthentication
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('recovery_code') && $request->user()) {
            $user = $request->user();
            $recoveryCode = $request->input('recovery_code');

            if ($user->useRecoveryCode($recoveryCode)) {
                // Recovery code is valid, proceed with authentication
                session()->flash('flash_success', __('Recovery code used successfully.'));
                return $next($request);
            }

            return back()->withErrors([
                'recovery_code' => __('Invalid or already used recovery code.')
            ]);
        }

        return $next($request);
    }
}
