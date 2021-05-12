<?php

namespace App\Http\Middleware;

use Closure;
use Directory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class AccessAdmin
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
        if (Gate::allows('is-admin')) {
            return $next($request);
        }
        return Redirect('/');
    }
}