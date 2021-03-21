<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class CheckUserStatus
{
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
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->to('/')->with('status', __("auth.not-{$column}"));
        }

        return $next($request);
    }
}
