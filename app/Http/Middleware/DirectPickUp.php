<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DirectPickUp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if (!$request->expectsJson()) {
        //     return route('loginpage');
        // }

        if (auth()->user()->priv === 'admin' || auth()->user()->priv === 'pic' || auth()->user()->priv === 'tlgam' || $_SERVER['REMOTE_ADDR'] === '172.21.25.205') {
        } else {
            abort(403);
        }
        return $next($request);
    }
}
