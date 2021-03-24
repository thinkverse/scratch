<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TemporaryUserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->hasVerifiedEmail() ||
            (now()->lessThan($request->user()->created_at->addDays(config('auth.temporary_access', 2)))
                && ! $request->user()->hasVerifiedEmail())) {
            return $next($request);
        }

        // Block user or whatever you need.

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->guest('/')->with('status', 'Your account needs to be verified, check your e-mail.');
    }
}
