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
        if (Auth::check() && Auth::user()->userType === config('constants.USER_TYPES.ADMIN')) {
            // If the user is an admin, proceed with the request
            return $next($request);
        } 
        // If not authenticated as admin, redirect to login
        return redirect('/login')->with('error', 'You must be logged in as an admin to access this page.');

    }
}
