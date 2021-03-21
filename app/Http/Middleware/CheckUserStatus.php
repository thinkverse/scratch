<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Closure;

class CheckUserStatus
{
    /** @var StatefulGuard $guard */
    protected StatefulGuard $guard;

    /**
     * Handle initialization of middleware.
     *
     * @param StatefulGuard $guard
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $column
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $column)
    {
        if (! $request->user()->{$column}) {
            $this->guard->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->to('/')->with('status', __("auth.not-{$column}"));
        }

        return $next($request);
    }
}
