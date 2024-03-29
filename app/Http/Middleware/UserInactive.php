<?php

namespace App\Http\Middleware;

// use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Http\Request;

class UserInactive
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->user()->status) {
            return redirect()->route('logout')->with(['error' => 'Su usuario ha sido bloqueado']);
        }
        return $next($request);
    }
}
