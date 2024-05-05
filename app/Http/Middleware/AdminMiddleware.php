<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
{
    if (!auth()->check() || !auth()->user()->isAdmin()) {
        return redirect('/sss')->with('error', 'У вас нет доступа к этой странице.');
    }

    return $next($request);
}
}
