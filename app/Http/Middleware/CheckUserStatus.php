<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Symfony\Component\HttpFoundation\Response;

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
        abort_unless($request->user()->{$column}, Response::HTTP_UNAUTHORIZED);

        return $next($request);
    }
}
