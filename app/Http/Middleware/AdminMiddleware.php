<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->user_type === 'admin') {
            return $next($request);
        } 
        if(Auth::check() && Auth::user()->user_type  === 'user') {
            abort(401, 'Unauthorized access.');
        }
        abort(401, 'Unauthorized access.');
    }
}
